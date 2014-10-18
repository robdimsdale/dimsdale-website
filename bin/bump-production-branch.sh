#!/bin/bash

set -e

CUR_BRANCH=$(git rev-parse --abbrev-ref HEAD)

read -r -p "You are about to alter the production website. Are you sure? [y/N] " response
if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
then
	set -x
	git checkout production
	git rebase master
	git push
	git checkout $CUR_BRANCH
else
	echo "Exiting."
	exit 1
fi
