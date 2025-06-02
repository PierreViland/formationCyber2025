#!/bin/bash

# Récupérer le nom du répertoire courant
NOM_TEX=$(basename "$PWD")

current_dir=$(pwd)
parent_dir=$(dirname "$current_dir")
SEQ_DIR=$(basename "$parent_dir")

# Afficher le nom du répertoire parent
echo "Le nom du répertoire juste au-dessus est : $parent_dir_name"
# Trouver un fichier .tex dans le répertoire courant
TEX_FILE=$(ls *.tex 2>/dev/null | head -n 1)

# Vérifier si un fichier .tex a été trouvé
if [ -z "$TEX_FILE" ]; then
    echo "Aucun fichier .tex trouvé dans le répertoire courant."
    exit 1
fi
PREFIX="${NOM_TEX:3:2}"
echo "Les 5 premiers caractères sont : $PREFIX"
