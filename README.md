# natux_mailer
Ez itt a natux mailer
Szukseges parancsok a futtatashoz:
    
	natux-api:
	
        -composer update(ha nem jo akk composer i)
		
        -php artisan key:generate
        
		-php artisan migrate
        
		-php artisan queue:work
    
	Kell egy masodik terminal a natux-api-hoz
    
		-php artisan serve
    
	natux-web:
    
		npm i
    
		npm run dev -- --host 127.0.0.1

.env file:

	APP_NAME=xXNatuXx

	QUEUE_CONNECTION=database

	ADMIN_EMAIL={az admin email cim}
	MAIL_MAILER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=587
	MAIL_USERNAME={errol az email cimrol kuldi az emailt}
	MAIL_PASSWORD={gmailba be kell lepni, fiok->beallitasok->2FA->alkalmazas jelszo letrehozasa, es szokozok nelkul bemasolod ide}
	MAIL_ENCRYPTION=tls
	MAIL_FROM_ADDRESS={errol az email cimrol kuldi az emailt}
	MAIL_FROM_NAME="${APP_NAME}"
