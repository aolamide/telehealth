#!/bin/bash

# This script will start a single "disposable" instance and connect the caller to it.
# The instance will link to all infrastructure, including the service containers (if it exists)
IMAGE_NAME="inhealth"

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ROOT="$(dirname "${SCRIPT_DIR}")"

# First check if our image has been built. If not, build it.
if [[ $(docker inspect --format='{{.RepoTags}}' ${IMAGE_NAME}) == "[${IMAGE_NAME}:latest]" ]]; then
    echo " ----- Web App Image Available for Use. -----"
else
    echo " ----- Web App Image Does Not Exist. Building Now. -----"
    docker build -t ${IMAGE_NAME} ${ROOT}
fi

echo " ----- Starting Disposable Docker Container -----"
echo " ----- Run Web Application Disposable Container -----"

docker run \
        -i \
        -t \
        -p 9999:80 \
        -v ${ROOT}:/var/www/html \
        ${IMAGE_NAME}


echo " ----- EXITED from disposable container -----"
echo " ----- Removing Exited Containers. -----"

# Now grep through all containers and stop those that have been "exited". Only do that for our service.
docker ps -a | grep Exited | awk '{ print $1,$2 }' | \
grep ${IMAGE_NAME} |  awk '{print $1 }' | xargs -I {} docker rm {}
