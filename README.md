# MoodSkyAPI
https://skyemotion.eu-west-1.elasticbeanstalk.com/

https://skyemotion.eu-west-1.elasticbeanstalk.com/

Having done the Sky Moodslider, I was thinking if I could build something which is more advanced in terms of recognizing the emotions as opposed to requiring user input.

I’ve decided to build a recommendation engine based on facial recognition and emotion analysis. I therefore needed an API which I could call and do the emotion analysis. 
Project: Sky Emotion

After looking and several options, Google Vision API, AWS Rekognition, Microsoft Face API (FKA ‘Project Oxford’), IBM Watson Visual Recognition API, Affectiva, Face++ and others, I’ve decided to use Kairos due to their well-documented API, the fact that they support Emotional Depth (%), and FREE trial account. 

: https://www.kairos.com/blog/face-recognition-kairos-vs-microsoft-vs-google-vs-amazon-vs-opencv

Using one of their demos: https://www.kairos.com/demos
For emotion analysis https://github.com/kairosinc/api-examples/tree/master/php-demo/emotion
And my own API credentials (I created my own account on Kairos)


I was able to implement a similar app where the user can turn on their webcam, capture 10seconds of video, the video would be uploaded and processed and the output of the analysis is displayed using highcharts.
highchartsApp.js = compiles the response data, and creates a dataset for each emotion in the JSON response. Loops through these datasets, compiling the x-axis, y-axis, and tooltip parameters for each emotion.
#highcharts-wrapper div. =  data is then rendered on the screen inside it
config.php =  colors for the indivdual emotion charts
#selected-video =  the highcharts graph is created, the selected video is rendered in an HTML5 tag
49 facial feature points are identified in the analysis, and these points are returned in the JSON object by adding landmarks=1 to the URL used for posting to the API. The postProcessingLayout() function sends the JSON data with the feature points to featurePointAnimation.js where they are drawn on a Canvas panel which is positioned over the top of the video or image. As the video plays, these feature points animate with the video.
The JSON object for each of the modules is displayed by clicking SHOW JSON in the Highcharts graph view on homepage.


I’ve then needed a cloud solution where I could deploy this. 
I’ve decided to deploy this on AWS.

I’ve deployed an application and an instance on AWS Elastic Beanstalk in region=eu-west-1 / Ireland

I configured the server with PHP 7.1 running on 64bit Amazon Linux/2.6.6 and a classic elastic load balancer, in the default security group.

I’ve then created a git repository using AWS CodeCommit, which I cloned in my local machine and init. I’ve added my code, committed and pushed to the git repo on AWS. 


In order for the code to work on aws elastic beanstalk (my server) I had to create a .ebextensions folder which holds the EC2 instance configuration file for beanstalk.
(I’ve done some reading through AWS docs: https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/create_deploy_PHP.container.html) 



I then needed a way to automate the deployment of new code directly from the git repo, and I’ve decided to use AWS CodePipeline a service that allowed me to automatically take the source code from the AWS CodeCommit repository when a change in code was detected, and deploy it to AWS Elastic beanstalk 

And now everything should work live on skyemotion.eu-west-1.elasticbeanstalk.com
BUT IT DIDN’T!

I found out that for the webcam to work I needed a SSL certificate (https://aws.amazon.com/certificate-manager/). However I didn’t have my own domain for this project to request one using AWS Certificate Manager, so I had to find a way to self sign it.
I’ve found this article which I’ve followed “Configuring Your Application to Terminate HTTPS Connections at the Instance running PHP” https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/configuring-https.html and “Configuring Your Elastic Beanstalk Environment's Load Balancer to Terminate HTTPS” https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/configuring-https-elb.html
To make it easier I switched back from using an elastic load balancer to a single instance and I’ve created the 2 files https-instance.config and https-instance-single.config in my .ebextensions folder. I used http://www.selfsignedcertificate.com/ to generate a self signed certificate and security key for domain: skyemotion.eu-west-1.elasticbeanstalk.com 
Stored the certificate and key in the file mentioned above and pushed to my AWS codecommit repository and AWS Pipeline automatically detected my changes and deployed my code to aws ElasticBeanstalk.

And now it worked. https://skyemotion.eu-west-1.elasticbeanstalk.com/ BUT
Because it is a self signed certificate not generated by any SSL authority, the browser renders this warning. 

Click advanced 













And then click proceed to … (unsafe)



I created and app that was showing the emotions by analysing the demo video (in the video folder), displaying the results of the analysis using charts, or by analysing webcam feed, photo uploaded or phot from url.

The result was coming in an encoded json as well. So from this step forward I had to learn about operating with a json file, decoding the json and being able to select specific elements that I’ve needed. 


-I created a json file jason.json where I stored the json result of the demo video analysis.
-I created  emotionPHP.php
-I created a new php file emoticon.php to be able to modify the code and to receive the json info into the json file (to update  the json the file with every video) .
-I created a function to transform the json file in a php string.
-I used a decoded json beautifier (http://phillihp.com/toolz/php-array-beautifier/) to be able to understand it faster
-I wrote a function that catched all the emotions for every frame, then I created a sum array, to be able to capture every emotion.
-Then I created a function to transform the xml file into an array that helped me to extract movies and images from our xml file/ films.
- I used a decoded php array beautifier and I catched the elements for every movie that I need.
I created a function that checked what emotion is greater as a value, and if it is a predominant value then 5 movies for that emmotion will apear.

 
 



Future work: 

Store information in a DB as opposed to an xml and allow the admin to upload videos and categorise them in a certain bucket (fear etc)
Using the extra info from the analysis (eg. Age, gender, glasses) I could display  different versions of the video covers to appeal to the user even more (eg: if the user is a female wearing glasses in her 40s, I could select from DB the movies for her emotional state, but at the same time populate the movie covers using the ones featuring characters that are females over 40s and wearing glasses – if there are such characters in the movie – to allow the user to connect to the character of that movie) 
Refactoring code and optimising for speed and better looking interface.

I need to create a refresh function for the page . Right now after creating a video we need to refresh the page to receive the movies for our mood. 



