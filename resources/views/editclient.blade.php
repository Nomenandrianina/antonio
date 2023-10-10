<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body style="background: darkslategrey;">    
<div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Ajout nouveau client</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.update') }}">
                         @csrf

                         <input type="hidden" name="id" value="{{ $client->id }}">

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom" value="{{ $client->nom }}" 
                                    autofocus>
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="statut">Statut</label>
                                <select id="statut" class="form-control" name="statut" required autofocus>
                                    <option value="VIP">VIP</option>
                                    <option value="Privilégié">Privilégié</option>
                                    <option value="Standard">Standard</option>
                                </select>
                                @if ($errors->has('statut'))
                                <span class="text-danger">{{ $errors->first('statut') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Contact" id="contact" class="form-control" name="contact" value="{{ $client->contact }}">
                                @if ($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                                @endif
                            </div>
 
                            <div class="form-group mb-3">
                                <input type="text" placeholder="whatsapp" id="whatsapp" class="form-control" name="whatsapp" value="{{ $client->whatsapp }}">
                                @if ($errors->has('whatsapp'))
                                <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" id="email" class="form-control" name="email" value="{{ $client->email }}">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Adresse" id="adresse" class="form-control" name="adresse" value="{{ $client->adresse }}">
                                @if ($errors->has('adresse'))
                                <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>
 
 
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Enregistrer</button>
                            </div>
                        </form>
 
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>