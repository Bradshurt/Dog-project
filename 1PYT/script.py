#!/usr/bin/env python3
import sys


def poser_questions():
    print("Bienvenue dans le test AdopteUnChien !\n")
    logement = input("1. Vivez-vous en appartement ou en maison ? [appartement/maison] : ").lower()
    sportif = input("2. Êtes-vous sportif ? [oui/non] : ").lower()
    enfants = input("3. Avez-vous des enfants ? [oui/non] : ").lower()
    taille = input("4. Préférez-vous un chien petit, moyen ou grand ? : ").lower()

    return logement, sportif, enfants, taille

def charger_chiens(fichier):
    chiens = []
    with open(fichier, mode='r', encoding='utf-8') as f:
        lignes = f.readlines()
        for ligne in lignes[1:]:
            race, enfants, sportif, appartement, taille = ligne.strip().split(',')
            chien = {
                "race": race,
                "enfants": enfants == "True",
                "sportif": sportif == "True",
                "appartement": appartement == "True",
                "taille": taille
            }
            chiens.append(chien)
    return chiens

def filtrer_chiens(chiens, logement, sportif, enfants, taille):
    resultats = []
    for chien in chiens:
        if (
            (logement == "appartement" and chien["appartement"]) or logement == "maison"
        ) and (
            (sportif == "oui" and chien["sportif"]) or sportif == "non"
        ) and (
            (enfants == "oui" and chien["enfants"]) or enfants == "non"
        ) and (
            chien["taille"] == taille
        ):
            resultats.append(chien["race"])
    return resultats

def afficher_resultats(races):
    if not races:
        print("\nDésolé, aucune race ne correspond à votre profil.")
    else:
        print("\nVoici les races de chiens qui vous correspondent :")
        for race in races:
            print(f"- {race}")

def main():
    logement, sportif, enfants, taille = poser_questions()
    chiens = charger_chiens("chien.txt")
    resultats = filtrer_chiens(chiens, logement, sportif, enfants, taille)
    afficher_resultats(resultats)

if __name__ == "__main__":
    main()
