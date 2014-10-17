#!/bin/bash

set -e

read -r -p "You are about to alter the production website. Are you sure? [y/N] " response
if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
then
	set -x
	git checkout production
	git rebase master
	git push
else
	echo "Exiting."
	exit 1 
fi

