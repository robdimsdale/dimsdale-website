@echo off
git pull && ^
git submodule foreach --recursive git submodule sync && ^
git submodule update --init --recursive
