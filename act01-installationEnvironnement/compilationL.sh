#!/bin/bash

NOM_TEX=$(basename "$PWD")
current_dir=$(pwd)
parent_dir=$(dirname "$current_dir")
SEQ_DIR=$(basename "$parent_dir")
echo "Le nom du répertoire juste au-dessus est : $SEQ_DIR"
TEX_FILE=$(ls *.tex 2>/dev/null | head -n 1)

if [ -z "$TEX_FILE" ]; then
    echo "Aucun fichier .tex trouvé dans le répertoire courant."
    exit 1
fi

if [ "$TEX_FILE" != "${NOM_TEX}.tex" ]; then
    mv -f "$TEX_FILE" "${NOM_TEX}.tex"
else
    echo "Les noms sont identiques, aucune action nécessaire."
fi

CHEMIN_TEX="$PWD/${NOM_TEX}.tex"


