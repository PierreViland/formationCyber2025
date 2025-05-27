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

# Génération du fichier professeur
pdflatex -job-name="${NOM_TEX}" "\def\PourProf{0} \def\numSeq{${SEQ_DIR:3:2}} \def\numAct{${NOM_TEX:3:2}} \input{$CHEMIN_TEX}"
mv "${NOM_TEX}.pdf" "${NOM_TEX}_P.pdf"

# Génération du fichier élève
pdflatex -job-name="${NOM_TEX}_E" "\def\numSeq{${SEQ_DIR:3:2}} \def\numAct{${NOM_TEX:3:2}} \input{$CHEMIN_TEX}"
mv "${NOM_TEX}.pdf" "${NOM_TEX}_E.pdf"

# Suppression des fichiers auxiliaires générés par LaTeX
rm -f *.aux *.log *.out *.gz 

echo "Nettoyage des fichiers temporaires terminé."

