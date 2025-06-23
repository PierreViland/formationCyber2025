#!/bin/bash
echo "Début script"

# Variables de chemin
NOM_TEX=$(basename "$PWD")
current_dir=$(pwd)
parent_dir=$(dirname "$current_dir")
SEQ_DIR=$(basename "$parent_dir")
echo "Le nom du répertoire juste au-dessus est : $SEQ_DIR"

# Cherche un fichier .tex
TEX_FILE=$(ls *.tex 2>/dev/null | head -n 1)
echo "Le nom du fichier trouvé est : $TEX_FILE"

# Vérification de la présence du fichier
if [ -z "$TEX_FILE" ]; then
    echo "Aucun fichier .tex trouvé dans le répertoire courant."
    exit 1
fi

# Renommage si nécessaire
if [ "$TEX_FILE" != "${NOM_TEX}.tex" ]; then
    echo "Renommage de $TEX_FILE en ${NOM_TEX}.tex"
    mv -f "$TEX_FILE" "${NOM_TEX}.tex"
else
    echo "Les noms sont identiques, aucune action nécessaire."
fi

CHEMIN_TEX="$PWD/${NOM_TEX}.tex"

# Compilation
pdflatex -jobname="${NOM_TEX}" "${NOM_TEX}.tex"
pdflatex -jobname="${NOM_TEX}" "${NOM_TEX}.tex"

# Renommer le PDF de sortie
mv "${NOM_TEX}.pdf" "${NOM_TEX}_E.pdf"

# Nettoyage
rm -f *.aux *.log *.out *.gz
echo "Nettoyage des fichiers temporaires terminé."
