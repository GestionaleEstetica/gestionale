<template>
<div class="row">
	<div class="col-md-8 col-sm-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<form name="changeDate" action="/" method="GET" style="color:white">
                    <span style="font-size: 30px; font-weight: bold">Giorno: {{normalizeDate(date)}}</span>
										<span class="pull-right">
											Seleziona Giorno<br>
											<input type="date" name="date" v-model="date" @change="changeDate()" style="color: black;">
										</span>
										</form>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead class="thead-light">
							<tr>
								<th class="col-md-1 col-sm-1 col-lg-1 text-center">Orario</th>
								<th class="text-center" v-for="user in users">{{user.first_name}}</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="orario in orari">
								<td class="text-center"><b>{{orario}}</b></td>
								<td v-for="user in users" v-if="hasDate(orario,user)" v-on:click.prevent="showDate($event)" v-bind:date-id="settedAppuntamento.id"  style="cursor:pointer" >
									<div >
										<span class="pull-left"><b>Cliente</b>: {{getClient(settedAppuntamento)}}</span>
                                        <br>
                                        <span class="pull-left"><b>Trattamenti</b>: {{getTreatments(settedAppuntamento)}}</span>
									</div>
								<td v-else-if="isNotFree(orario,user)" class="text-center" style="cursor: not-allowed; background-color: #FFE9B4; width:20%">
								</td>
                <td v-else @click="create(orario,user)" class="block__wrap" style="cursor: pointer;">
                    <p class="block__description text-center">Nuovo appuntamento</p>
                </td>
                </td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>

    <form name="create" action="/dates/create" method="GET">
        <input type="hidden" name="orario" value="">
        <input type="hidden" name="user" value="">
        <input type="hidden" name="data" value="">
    </form>

</div>
	</template>
  <script type="text/javascript">
    export default {
        name: 'index-date',
        props: ['users', 'dates','date','clients'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                orari: ['09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'],
                settedOrario: [],
                active: false
            }
        },
        methods:
        {
					showDate: function(obj)
					{

						var element = event.currentTarget
						console.log(element);
						var id = element.getAttribute('date-id');
						window.location.href = "/dates/"+id;
					},

					calcolateTH: function(timeSplitted, duration)
					{
						var treatH = parseInt( (duration+Number(timeSplitted[1])) / 60);
						var treatM = ( (duration+Number(timeSplitted[1])) % 60);
						var Hsum = Number(timeSplitted[0])+treatH;
						if (Hsum.toString().length < 2) Hsum = "0"+Hsum;
						if ( treatM == 0)
							var sum = (Hsum)+":"+(treatM+"0");
						else
							var sum = (Hsum)+":"+(treatM);
						return sum;
					},

					calcolateAllTimeTreatments: function(treatments)
					{
						var totTreatsTime = 0;
						for ( var k = 0; k < treatments.length; k++)
							totTreatsTime += ( Number(treatments[k].duration) * treatments[k].pivot.quantity );
						return totTreatsTime;
					},

					takeClosest: function(orario, user)
					{
						var closest = null;
						for (var i = 0; i < this.dates.length; i++) {
							var date = this.dates[i];
							if ( user.id == date.user_id && orario > date.time){
								if ( closest == null || date.time > closest.time ) closest = date;
								else continue;
							}
						}
						return closest;
					},

					isNotFree: function(orario, user)
					{

						var date = this.takeClosest(orario, user);
							if ( date != null) {
								var timeSplitted = date.time.split(':');
								var totTreatsTimeM = this.calcolateAllTimeTreatments(date.treatments);
								var dateTotTime = this.calcolateTH(timeSplitted, totTreatsTimeM);
								console.log(dateTotTime);
								if ( orario < dateTotTime) return true
							}
						return false;
					},


					normalizeDate: function(date)
					{
						var d = new Date(date);
						return d.toLocaleDateString(["it"],{"year": "numeric","month": "2-digit","day": "2-digit"});
					},

        	changeDate: function()
        	{
		        document.forms['changeDate'].submit();
        	},

        	hasDate: function(orario,user)
        	{
        		for (var i=0; i < this.dates.length; i++)
        		{
        			var appuntamento = this.dates[i]
        			if (this.normalize(appuntamento.time) == orario && appuntamento.user_id == user.id)
        			{
        				this.settedAppuntamento = appuntamento
        				return true;
        			}
        		}
        		return false;
        	},
        	normalize: function(orario)
        	{
        		var ind = orario.lastIndexOf(':')
        		return orario.substring(0,ind)
        	},
        	getClient: function(appuntamento)
        	{
        		var clientId = appuntamento.client_id
        		var clientInfo = ""
        		for (var i = this.clients.length - 1; i >= 0; i--) {
        			var client = this.clients[i]
        			if (client.id == clientId){
        				clientInfo += client.first_name +" "+ client.last_name
        				return clientInfo
        			}
        		}
        	},
        	getDescription: function(appuntamento)
        	{
        		var desc = appuntamento.description
        		if (desc == null) return "Nessuna descrizione"
        		return desc.length > 20? desc.substring(0,20) + "..." : desc
        	},

					getTreatments: function(appuntamento){
						var treatments;
						for (var i = 0; i < appuntamento.treatments.length; i++) {
							if ( treatments == null ) treatments = appuntamento.treatments[i].name;
							else treatments += (" | " + appuntamento.treatments[i].name);
						}
						return treatments.length > 25? treatments.substring(0,25) + "..." : treatments;
					},

            create: function(orario,user)
            {
                document.create.orario.value = orario;
                document.create.user.value = JSON.stringify(user);
                document.create.data.value = this.date;
                document.forms['create'].submit();
            }
        }
    }
</script>
