#!/bin/bash
set -xeu

image=rg.hoantran.me/do-an/php:$(date +%s)

sudo docker build -t $image .  && \
sudo docker push $image  && \

cd ~/project/K8s-manifest/do-an; kustomize edit set $image  && \

git add .  && \
git commit -m "Update do-an image to $image"  && \
git push   && \

ssh-agent && eval "$(ssh-agent)" && ssh-add ~/.ssh/id_ed25519 && ssh -A hoantd-k0 'cd K8s-manifests && git pull' && \
ssh hoantd-k0 kubectl apply -k K8s-manifests/do-an && \


echo "Deployed"  && \
echo $IMAGE
