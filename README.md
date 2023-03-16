# NCVO Demo Apps

Here are a number of apps that demonstrat ehow to use the Front Controller in the NCVO infrastructure.

## Developing

### Setting up

    npm -i

### Release a version

### Patch releases

    npm run release
    git push --follow-tags origin main

### Major and Minor release

    ./node_modules/.bin/standard-version -r minor

or

    ./node_modules/.bin/standard-version -r major

then

    git push --follow-tags origin main

## Enable the dev tunnel

    document.cookie = `fc_hmac_dev_tunnel=DEV_TUNNEL:<ASK NEONTRIBE FOR A VALID VALUE HERE>; expires=${new Date(Date.now() + 30*24*60*60*1000).toUTCString()}; path=/;`

## Dev Tunnels

    ngrok http 8080

## HTTP Parameter

    https://devapp.fc.integration.ncvocloud.net/?dev_tunnel=https://cc64-86-154-116-73.eu.ngrok.io

## Cookie

    document.cookie = `dev_tunnel=https://cc64-86-154-116-73.eu.ngrok.io; expires=${new Date(Date.now() + 30*24*60*60*1000).toUTCString()}; path=/;`
