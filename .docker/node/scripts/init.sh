#!/bin/sh
npm install
npm run watch-poll
exec "$@"
