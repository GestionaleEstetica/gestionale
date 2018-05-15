<template>
<div>
	<div class="row">
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-comments fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<h2><div class="huge">{{ dates.length }}</div></h2>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<h4 style="margin:0">Totale appuntamenti segnati</h4>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-tasks fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<h2><div class="huge">{{ clients.length }}</div></h2>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<h4 style="margin:0">Totale clienti aggiunti</h4>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row" onclick="location.href='/admin/stats/showSales'" style="cursor: pointer;">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<h2><div class="huge">{{ sales.length }}</div></h2>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<h4 style="margin:0">Totale vendite effettuate</h4>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-support fa-5x"></i>
						</div>
						<div class="col-xs-8 text-right">
							<h2><div class="huge">{{ products.length }}</div></h2>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<h4 style="margin:0">Totale tipi prodotti in magazzino </h4>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				Statistiche di oggi
				</h4>
			</div>
			<div class="panel-body">
				Vendite effettuate<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="15"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(todayStats(sales,day)) + '%'">{{todayStats(sales,day)}}</div>
				</div>

				Appuntamenti annotati<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="30"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(todayStats(dates,day)) + '%'">{{todayStats(dates,day)}}</div>
				</div>

				Nuovi clienti<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="8"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(todayStats(clients,day)) + '%'">{{todayStats(clients,day)}}</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				Statistiche del mese
				</h4>
			</div>
			<div class="panel-body">
				Vendite effettuate<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="15"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(monthStats(sales,month)) + '%'">{{monthStats(sales,month)}}</div>
				</div>
				Appuntamenti annotati<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="30"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(monthStats(dates,month)) + '%'">{{monthStats(dates,month)}}</div>
				</div>
				Nuovi clienti<span class="pull-right strong"></span>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="8"aria-valuemin="0" aria-valuemax="100" :style="'width:'+ getBarWidth(monthStats(clients,month)) + '%'">{{monthStats(clients,month)}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script type="text/javascript">
export default {
    name: 'stats',
    props: ['clients','dates','sales', 'treatments','products'],
        data() {
            return {
            	day: this.today(),
            	month: this.thisMonth()
            }
        },
    methods:
    {
    	today: function()
    	{
    	var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();

			if(dd<10) dd = '0'+dd
			if(mm<10) mm = '0'+mm

			today = yyyy + '-' + mm + '-' + dd;
			return today;
    	},
    	thisMonth: function()
    	{
    		var date = new Date().getMonth()+1;
    		if (date.length == 2) return date
    		else return "0" + date;
    	},
    	trimDate: function(date)
    	{
    		var i = date.toString().indexOf(" ");
    		var newDate = date.toString().substring(0,i);
    		return newDate;
    	},
    	todayStats: function(array,day)
    	{
    		var $this = this;
    		var result = array.filter(function(elem){
    			return $this.trimDate(elem.created_at) === day;
    		});
    		return result.length;
    	},
    	monthStats: function(array,month)
    	{
    		var result = array.filter(function(elem){
    			return elem.created_at.slice(5,7) == month
    		})
    		return result.length
    	},
    	getBarWidth: function(valore)
    	{
    		if (valore < 4) return 30;
    		else if (valore < 8) return 60;
    		else if (valore > 8) return 90;
    	}
    },
    computed:
    {

    }
}
</script>
