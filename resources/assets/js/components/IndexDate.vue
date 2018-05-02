<template>
<div class="row">
	<div class="col-md-8 col-sm-12 col-lg-10">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <h3 style="margin:0">
                    <span>Calendario</span>
                    <span class="pull-right">{{date}}</span>                  
                </h3>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center">Orario</th>
								<th class="text-center" v-for="user in users">{{user.first_name}}</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="orario in orari">
								<td><b>{{orario}}</b></td>
								<td v-for="user in users" v-if="hasDate(orario,user)">
									<div>
										<span class="pull-left"><b>Cliente</b>: {{getClient(settedAppuntamento)}}</span>
                                        <form :action="'/dates/'+settedAppuntamento.id" method="GET">
                                        <button type="submit" class="btn btn-outline btn-primary pull-right clearfix">Mostra</button>
                                        </form>
                                        <br>
                                        <span class="pull-left"><b>Descrizione</b>: {{getDescription(settedAppuntamento)}}</span>
									</div>
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
		<div class="col-md-2">
			<label>Seleziona il giorno:</label>
		<form name="changeDate" action="/" method="GET">
			<input type="date" name="date" v-model="date" @change="changeDate()">
		</form>
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
        				clientInfo += client.first_name + client.last_name
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