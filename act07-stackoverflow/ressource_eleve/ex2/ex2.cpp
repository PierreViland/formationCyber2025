#include <cstdio>
#include <cstring>
#include <iostream>

using namespace std;

char phrase[] ="___________________________________________";

void fctUtile()
{
	char login[10];
	cout << "Fct utile \n";
	cout << "Login ";
	cin >> login;

	cout << "Votre login est " << login << "\n";


}

void fctNoUse()
{
	cout << phrase;
}


int main( void )
{
	cout << "Debut\n"; 
	fctUtile(); 
	cout << "fin\n"; 
	return ( 0 );
}
