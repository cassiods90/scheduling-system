AWS:

Add to hosts:
127.0.0.1 aws.scheduling.com
0.0.0.0 scheduling-app.aws.scheduling.com

- Install AWS CLI
- Run: aws --endpoint-url=http://aws.scheduling.com configure
AWS Access Key ID [****************ader]: scheduling <- Type smarleader and press enter
AWS Secret Access Key [****************ader]: scheduling <- Type smarleader and press enter
Default region name [us-east-1]: us-east-1 <- Type us-east-1 and press enter
Default output format [None]: json <- Type json and press enter

- Run: aws --endpoint-url=http://aws.scheduling.com:4566 s3 mb s3://scheduling-app
- Run: aws --endpoint-url=http://aws.scheduling.com:4566 s3 mb s3://tmp-files
- Run: aws --endpoint-url=http://aws.scheduling.com:4566 s3api put-bucket-acl --bucket scheduling-app --acl public-read
- Run: aws --endpoint-url=http://aws.scheduling.com:4566 s3api put-bucket-acl --bucket tmp-files --acl public-read
    - Press Q if a black window appear