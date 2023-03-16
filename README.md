
## Build docker in the FC

    docker build -t ncvo/front-controller .

## Start the FC with the demo routes

On windoze you'll need to adjust the `-v` option to something like `-v "c:/users/uname/projects/this/project/routes:/opt/front_controller/routes"`

    docker run --rm -ti --net=host --name fc -e ROUTES_MANIFEST=file://./routes/demo.yml -v $(pwd)/routes:/opt/front_controller/routes ncvo/front-controller

## Start your hosted app

We'll use an simple nginx server.

    docker run --rm --name some-nginx -v $(pwd):/usr/share/nginx/html:ro -p8080:80 nginx

## Enable a route back to your app from the fromt controller

I'll use ngrok

    ngrok http eightyeighty.test:3000

## Pass the dev host parameter to the application

You'll need to encode the URL for that endpoint, for example `https%3A%2F%2F0df8-aa-bb-cc.eu.ngrok.io` then open this link in your front controller.See [here](https://www.urlencoder.org/) for the encoder

http://eightyeighty.test:3000?devCookieHost=https%3A%2F%2F0df8-aa-bb-cc.eu.ngrok.io


NGINX

docker run --rm --name some-nginx -v $(pwd)/nginx/default.conf:/etc/nginx/conf.d/default.conf:ro --net=host nginx


