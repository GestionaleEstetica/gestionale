<template>
<form name="submitSale" method="POST" action="/dates">
<div class="row">
	<div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Appuntamento</div>
			<div class="panel-body">
					<div class="form-group">
						<label>Seleziona Cliente ( ricerca per cognome )</label>
						<input type="text" placeholder="Cerca.." v-model="searchClient" class="form-control">
						<div class="panel-footer">
							<ul class="list-group">
								<li @click="setClient(client)"
								class="list-group-item"
								v-if="searchClient!=''"
								v-for="client in filteredClients"
								style="cursor: pointer;">
									<b>{{ client.first_name }} {{ client.last_name }}</b> | telefono: {{client.phone}}
								</li>
							</ul>
						</div>
					</div>
				<div class="form-group" >
					<label>Data</label>
					<input name="date" type="date" class="form-control" v-model="data">
				</div>
				<div class="form-group">
					<label>Ora</label>
					<input name="time" type='time' class="form-control" v-model="orario">
				</div>
				<div class="form-group">
					<label>Ricerca uno o più trattamenti</label>
					<input type="text" placeholder="Cerca.." v-model="search" class="form-control">
					<div class="panel-footer">
						<ul class="list-group">
							<li @click="addTreatment(treatment)"
							class="list-group-item"
							v-if="search!=''"
							v-for="treatment in filteredTreatments"
							style="cursor: pointer;">
								<b>{{ treatment.name }}</b> | {{treatment.duration}} MIN | {{treatment.price}} €
							</li>
						</ul>
					</div>
				</div>
				<div class="form-group">
					<label>Descrizione opzionale</label>
					<textarea class="form-control" v-model="description"></textarea>
				</div>
			</div>
		</div>
	</div>
			<div class="col-md-2 col-lg-2">
				<div class="panel panel-primary" style="position:fixed;">
					<div class="panel-heading">
						Scheda appuntamento
					</div>
					<div class="panel-body">
						<div><b>Cliente:</b> {{ client.first_name }} {{ client.last_name }}</div>
						<div><b>Data:</b> {{ date }}</div>
						<div><b>Orario:</b> {{ time }}</div>
<br>
						<div><b>Trattamenti prenotati:</b></div>
						<ul v-for="treatment in listedTreatments">
							<li @click="removeTreatment(treatment)" style="cursor:pointer">{{treatment.name}} || {{treatment.price}} €</li>
						</ul>
						<p class="text-danger">* Clicca sul trattamento per rimuoverlo</p>
						</ul>
						<input type="hidden" name="_token" :value="csrf">
						<input type="hidden" name="client_id" value="">
						<input type="hidden" name="treatments" value="">
						<input type="hidden" name="description" value="">
						<input type="hidden" name="user_id" :value="user.id">
						<button class="btn btn-success pull-right" v-if="listedTreatments.length > 0 && client && data && orario" @click="submit">Invia</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</template>
  <script type="text/javascript">
    export default {
        name: 'dates',
        props: ['clients', 'treatments','user','orario','data'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				searchClient:'',
                search:'',
                listedTreatments: [],
                client:'',
                description:''
            }
        },
        methods:
        {
        	addTreatment: function(treatment)
        	{
        		this.listedTreatments.push(treatment)
        		this.search = ""
        	},
        	removeTreatment: function(treatment)
			{
				var index = this.listedTreatments.indexOf(treatment);
				this.listedTreatments.splice(index,1)
			},
			setClient: function(client)
			{
				this.client = client;
				this.searchClient = "";
			},
        	submit: function()
        	{
              document.submitSale.client_id.value = this.client.id;
              document.submitSale.treatments.value = JSON.stringify(this.listedTreatments);
              document.submitSale.description.value = this.description;
              document.forms['submitSale'].submit();
            }
        },
        computed:
        {
		    sortedClients()
		    {
		      return _.orderBy(this.clients, 'first_name');
		    },
			filteredTreatments: function()
			{
                return this.treatments.filter((treatment) =>
                {
                    var treatment = treatment.name.toLowerCase();
                    var search = this.search.toLowerCase();
                    return treatment.match(search);
                })
            },
			filteredClients: function()
			{
                return this.clients.filter((client) =>
                {
                    var client = client.last_name.toLowerCase();
                    var search = this.searchClient.toLowerCase();
                    return client.match(search);
                })
            },
        }
    }
</script>
