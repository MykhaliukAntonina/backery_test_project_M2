#!/bin/bash

args=""
for var in "$@"
do
  args+=" ${var}"
done
php8.1 ${args}
