#include <cstdio>
#include <cstring>
#include <iostream>



int main( void )
{
	int authentification= 0;
	char login[10];
	char mdp[10];

	char monLog[] = "_______";
	char monMdp[] = "________";


 	std::cout << "Login : ";
	std::cin >> login;

	std::cout << "Mot de passe : ";
	std::cin >> mdp;


	std::cout << "authentification AVANT "  << authentification << "\n"; 

	if( std::strcmp(login, monLog) == 0 && std::strcmp( mdp, monMdp) == 0 )
	{
		std::cout << "Verification OK" << "\n"; 
		authentification = 1;
	}
	std::cout << "authentification APRES "  << authentification  << "\n"; 
	
	if( authentification == 1 )
	{
		std::cout << "Acces autorise\n";
		std::cout << "________________________________________________________________________________________" ;
	}
	else
	{
		std::cout << "Acces non autorise\n";
	}
	
	return ( 0 );
}
