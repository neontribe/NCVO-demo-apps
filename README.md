
## Build docker in the FC

    docker build -t ncvo/front-controller .

## Start the FC with the demo routes

On windoze you'll need to adjust the `-v` option to something like `-v "c:/users/uname/projects/this/project/routes:/opt/front_controller/routes"`

    docker run --rm -ti -p 3000:3000 --name fc -e ROUTES_MANIFEST=file://./routes/demo.yml -v $(pwd)/routes:/opt/front_controller/routes ncvo/front-controller

## Add dmeo endpoint to your host file

On windoze you'll need to see [here](https://docs.rackspace.com/support/how-to/modify-your-hosts-file/)

    echo '127.0.0.1 eightyeighty.test' | sudo tee -a /etc/hosts
