if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        //qualcuno a premuto aggiungi
        // - [] creo un istanza User
        // - [] Effettuo la validazione e sanificazione dei valori dell'istanza di User
        // - se tutto è ok salvo l'utente --> si va a una pagina di conferma
            // [] Istanza del model uso il metodo create
        // - sè non è tutto ok rimango sul form e segnalo gli errori

        // per ogni errore / campo
        // *firtsName ok "Mario" *lastName vuoto
        // rimango nel form
        // *firstName "Mario" *lastName 
        // Risultato della validazione,fa vedere un 
        //                           - messaggio "Campo obbligatorio"
        //  isValid = true           - isValid = false
        //                           - code
        // valore predefinito
        // ''
        // "Mario"                   - ' '
        //
        //


        //posso controlare i dati e se sono giusti inserire il nuovo utente
        //UserFactory
        $user = new User ($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
        $userModel = new UserModel();
        $userModel->create($user);
    }