#!/bin/bash

set -e

if [ -z $USER ]; then
  echo "USER environment variable not set. Exiting."
  exit 1
fi

if [ -z $HOST ]; then
  echo "HOST environment variable not set. Exiting."
  exit 1
fi

if [ -z $SRC_DIR ]; then
  echo "SRC_DIR environment variable not set. Exiting."
  exit 1
fi

if [ -z $HTML_DIR ]; then
  echo "HTML_DIR environment variable not set. Exiting."
  exit 1
fi

export TAR_FILE=website.tar
export REMOTE_DIR_CURRENT=/var/dimsdale-website-current
export REMOTE_DIR_PREVIOUS=/var/dimsdale-website-previous

echo "Changing directory to $SRC_DIR..."
cd $SRC_DIR
echo "Changing directory to $SRC_DIR... done"

echo "Creating $TAR_FILE..."
tar --exclude='build' --exclude='.git' -cf ~/$TAR_FILE *
echo "Creating $TAR_FILE... done"

echo "Copying $TAR_FILE to /tmp on $HOST..."
scp ~/$TAR_FILE $USER@$HOST:/tmp/$TAR_FILE
echo "Copying $TAR_FILE to /tmp on $HOST... done"

echo "On $HOST, copying $REMOTE_DIR_CURRENT to $REMOTE_DIR_PREVIOUS and pointing live to $REMOTE_DIR_PREVIOUS..."
ssh $USER@$HOST "rm -rf $REMOTE_DIR_PREVIOUS && cp -r $REMOTE_DIR_CURRENT $REMOTE_DIR_PREVIOUS && rm $HTML_DIR && ln -s $REMOTE_DIR_PREVIOUS/public_html $HTML_DIR"
echo "On $HOST, copying $REMOTE_DIR_CURRENT to $REMOTE_DIR_PREVIOUS and pointing live to $REMOTE_DIR_PREVIOUS... done"

echo "On $HOST, untarring $TAR_FILE into $REMOTE_DIR_CURRENT and removing $TAR_FILE from /tmp..."
ssh $USER@$HOST "cd $REMOTE_DIR_CURRENT && rm -rf * && tar -xf /tmp/$TAR_FILE && rm -f /tmp/$TAR_FILE"
echo "On $HOST, untarring $TAR_FILE into $REMOTE_DIR_CURRENT and removing $TAR_FILE from /tmp... done"

echo "On $HOST, pointing live to $REMOTE_DIR_CURRENT on $HOST..."
ssh $USER@$HOST "rm $HTML_DIR && ln -s $REMOTE_DIR_CURRENT/public_html $HTML_DIR"
echo "On $HOST, pointing live to $REMOTE_DIR_CURRENT on $HOST... done"
