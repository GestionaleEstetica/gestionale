<template>
<form name="submitSale" method="POST" :action="'/dates/'+appointment.id">
<div class="row">
	<div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">Appuntamento</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Cliente</label>
					<select class="form-control" v-model="client">
						<option value="appointment" v-for="client in sortedClients" :value="client">
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
							<li @click="removeTreatment(treatment)" style="cursor:pointer">{{treatment.name}} || {{treatment.price}} € || {{treatment['pivot'].quantity}} </li>
						</ul>
						<p class="text-danger">* Clicca sul trattamento per rimuoverlo</p>
						<input type="hidden" name="_token" :value="csrf">
						<input type="hidden" name="client_id" value="">
						<input type="hidden" name="treatments" value="">
						<input type="hidden" name="description" value="">
						<input type="hidden" name="_method" value="PUT">
						<button class="btn btn-success pull-right" v-if="listedTreatments.length > 0 && client && date && time" @click="submit">Invia</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</template>
<script type="text/javascript">
export default {
    name: 'edit-date',
    props: ['appointment','clients','client', 'treatments','sales'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            search:'',
            listedTreatments: this.sales,
            date:this.appointment.date,
            time:this.appointment.time,
            description:this.appointment.description
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
    	trim: function(array)
    	{
    		for (var i = array.length - 1; i >= 0; i--) {
    			delete array[i]["pivot"]
    		}
    		return array;
    	},
    	quantity: function(value)
    	{

			var count = this.listedTreatments.reduce(function(n, val) {
			    return n + (val === value);
			}, 0);

			return count
    	},
    	submit: function() 
    	{
	        document.submitSale.client_id.value = this.client.id;
    		this.listedTreatments = this.trim(this.listedTreatments);
	        document.submitSale.treatments.value = JSON.stringify(this.listedTreatments);
	        document.submitSale.description.value = this.description;
	        console.log(this.description)
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