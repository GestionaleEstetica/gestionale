<template>
<form name="submitSale" method="POST" action="/dates">
<div class="row">
	<div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Appuntamento</div>
			<div class="panel-body">
				<div class="form-group">

					<label>Cliente</label>
					<select class="form-control" v-model="client">
						<option v-for="client in sortedClients" :value="client" >
						{{client.first_name}} {{client.last_name}} || {{client.email}}</option>
					</select>
				</div>
				<div class="form-group" >
					<label>Data</label>
					<input name="date" type="date" class="form-control" v-model="date">
				</div>
				<div class="form-group">
					<label>Ora</label>
					<input name="time" type='time' class="form-control" v-model="time">
				</div>
				<div class="form-group">
					<label>Ricerca uno o più trattamenti</label>
					<input type="text" placeholder="Cerca.." v-model="search" class="form-control">
					<div class="panel-footer">
						<ul class="list-group">
							<li @click="addTreatment(treatment)" class="list-group-item" v-if="search!=''" v-for="treatment in filteredTreatments" style="cursor: pointer;">
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
						<div><b>Cliente:</b> {{ client.first_name }}</div>
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
						<button class="btn btn-success pull-right" v-if="listedTreatments.length > 0 && client && date && time" @click="submit">Invia</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</template>
  <script type="text/javascript">
    export default {
        name: 'dates',
        props: ['clients', 'treatments'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                search:'',
                listedTreatments: [],
                client:'',
                date:'',
                time:'',
                description:'Nessuna descrizione'
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
        }
    }
</script> 