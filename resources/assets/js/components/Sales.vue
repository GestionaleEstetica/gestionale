<template>
<div id="sales">
  <div class="col-md-4 col-md-offset-3">
    <div class="form-group input-group">
      <input type="text" v-model="search" class="form-control" placeholder="Cerca..">
      <span class="input-group-btn">
        <button class="btn btn-default" type=""><i class="fa fa-search"></i></button>
      </span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-12 col-lg-8">
      <div class="panel-body">
        <div class="table-responsive">
          <div class="row">
            <div class="col-md-7">
              <button v-if="productView" @click="showTreatments" class="btn btn-primary"><b>MOSTRA TRATTAMENTI</b></button>
              <button v-else @click="showProducts" class="btn btn-primary"><b>MOSTRA PRODOTTI</b></button>
            </div>
          </div>
          <table class="table table-bordered table-hover">
            <thead class="text-center">
              <tr>
                <th>Codice</th>
                <th>Nome</th>
                <th v-if="productView">Marca</th>
                <th v-if="productView">Quantità</th>
                <th v-else>Durata</th>
                <th>Prezzo</th>
              </tr>
            </thead>
            <tbody>
              <tr v-if="productView" v-for="product in filteredProducts">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.brand }}</td>
                <td>{{ product.quantity }}</td>
                <td>{{ product.price }}</td>
                <td class="text-center">
                  <button class="btn btn-success" @click="pushItem(product,'product')">+</button>
                  <button class="btn btn-danger" @click="removeItem(product,'product')">-</button>
                </td>
                <tr v-if="!productView" v-for="treatment in filteredTreatments">
                  <td>{{ treatment.id }}</td>
                  <td>{{ treatment.name }}</td>
                  <td>{{ treatment.duration }}</td>
                  <td>{{ treatment.price }}</td>
                  <td class="text-center">
                    <button class="btn btn-success" @click="pushItem(treatment,'treatment')">+</button>
                    <button class="btn btn-danger" @click="removeItem(treatment,'treatment')">-</button>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-primary" style="position:fixed;">
            <div class="panel-heading">
              Vendite selezionate
            </div>
            <label>Seleziona un dipendente:</label>
              <select name="submitUser" v-model="user" class="form-control" >
                <option name="selection" v-for="user in users" :value="user.id"> {{user.first_name}} {{user.last_name}}</option>
            </select>
            <div class="panel-body">

              <ul v-for="sale in shownSales">
                <li>{{sale.name}} | <span v-if="sale.brand"><label>prodotto</label></span> <span v-else><label> trattamento</label></span> </li>
              </ul>
              <form name="submitSale" method="POST" action="/sales">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="products" value="">
                <input type="hidden" name="treatments" value="">
                <input type="hidden" name="user" value="">
                <input type="submit" v-if="user != null && shownSales.length != 0" value ="Invia" class="btn btn-success pull-right" @click="submit">
              </form>
              <p v-if="user == null" class="text-warning">* Selezionare un dipendente.</p>
              <p v-if="shownSales.length == 0" class="text-warning">* Inserire almeno un prodotto/trattamento.</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </template>
  <script type="text/javascript">
    export default {
        name: 'sales',
        props: ['products', 'treatments','users'],
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                search: '',
                productView: true,
                listedProducts: [],
                listedTreatments: [],
                shownSales: [],
                user: null,
            }
        },
        methods: {
            showProducts: function() { this.productView = true; },
            showTreatments: function() { this.productView = false; },
            pushItem: function(item, type) {
                if (type == 'product') this.listedProducts.push(item);
                else this.listedTreatments.push(item);

                this.shownSales.push(item);
            },
            removeItem: function(item, type) {
                if (type == 'product') {
                    var i = this.listedProducts.indexOf(item);
                    if (i != -1) this.listedProducts.splice(i, 1);
                } else {
                    var i = this.listedTreatments.indexOf(item);
                    if (i != -1) this.listedTreatments.splice(i, 1);
                }

                var i = this.shownSales.indexOf(item);
                if(i != -1) this.shownSales.splice(i,1);
          },
            submit: function() {
              if (this.user == null) return alert('Selezionare un dipendente');

              document.submitSale.products.value = JSON.stringify(this.listedProducts);
              document.submitSale.treatments.value = JSON.stringify(this.listedTreatments);
              document.submitSale.user.value = this.user;
              document.forms['submitSale'].submit();
            }
         },
        computed: {
            filteredProducts: function() {
                return this.products.filter((product) => {
                    var product = product.name.toLowerCase();
                    var search = this.search.toLowerCase();
                    return product.match(search);
                })
            },
            filteredTreatments: function() {
                return this.treatments.filter((treatment) => {
                    var treatment = treatment.name.toLowerCase();
                    var search = this.search.toLowerCase();
                    return treatment.match(search);
                })
            },
        }
    }

</script> 