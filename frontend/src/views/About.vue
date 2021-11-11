<template>
  <div class="content" style="padding: 100px;">
    <h1>God Shop</h1>
    <div class="col-md-12">
      <table id="table" class="table table-responsive-xl">
        <thead>
            <tr>
              <th>Id</th>
              <th>Customer</th>
              <th>Email</th>
              <th>Address</th>
              <th>Indetification</th>
              <th>Phone</th>
              <th>Priority</th>
              <th>Total</th>
              <th>Date</th>
              <th>Dead Line</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="order in orders" v-bind:key="order.id">
              <th class="link-primary" style="cursor:pointer;" @click="modalOrder(order)" data-bs-toggle="modal" data-bs-target="#modalOrder">{{order.id}}</th>
              <th>{{order.customer_name}}</th>
              <th>{{order.customer_email}}</th>
              <th>{{order.address}}</th>
              <th>{{order.customer_identification}}</th>
              <th>{{order.customer_phone}}</th>
              <th>
                <span v-if="order.priority === 'no urgency'" class="badge bg-success"><small>{{order.priority}}</small></span>
                <span v-if="order.priority === 'medium'" class="badge bg-warning"><small>{{order.priority}}</small></span>
                <span v-if="order.priority === 'urgent'" class="badge bg-danger"><small>{{order.priority}}</small></span>
              </th>
              <th><strong> ${{order.total}}</strong></th>
              <th>{{order.created_at}}</th>
              <th>{{order.deadline}}</th>
            </tr>
        </tbody>
      </table>
      <div class="label">
        Check date
      </div>
      <input v-model="date" class="form-control" type="date" @change="checkDate"/>
    </div>
    <div class="modal fade" id="modalOrder" tabindex="-1" aria-labelledby="modalOrderLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Order #{{order.id}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-responsive-xl">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Stock</th>
                    <th>Barcode</th>
                    <th>Supplier</th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="item in order.products" v-bind:key="item.id">
                    <th>{{item.product.id}}</th>
                    <th>{{item.product.name}}</th>
                    <th><strong> ${{item.product.price}}</strong></th>
                    <th>
                      <span v-if="item.product.status === 'In Stock'" class="badge bg-success"><small>{{item.product.status}}</small></span>
                      <span v-if="item.product.status === 'To Run Out'" class="badge bg-warning"><small>{{item.product.status}}</small></span>
                      <span v-if="item.product.status === 'Out'" class="badge bg-danger"><small>{{item.product.status}}</small></span>
                    </th>
                    <th><strong><strong>{{item.product.stock}}</strong></strong></th>
                    <th><strong> {{item.product.bar_code}}</strong></th>
                      <th>
                        <a :href="'mailto:' + item.product.supplier.email">
                          {{item.product.supplier.name}}
                        </a>
                         - 
                        <a :href="'phone:' + item.product.supplier.phone">
                         {{item.product.supplier.phone}}
                        </a>
                      </th>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import "datatables.net-buttons/js/dataTables.buttons.js"
import "datatables.net-buttons/js/buttons.colVis.js"
import "datatables.net-buttons/js/buttons.flash.js"
import "datatables.net-buttons/js/buttons.html5.js"
import "datatables.net-buttons/js/buttons.print.js"
import $ from 'jquery'; 

export default {
  name: 'Notes',
  data: () => {
    return {
      orders: [],
      order: [],
      you: null,
      message: '',
    }
  },
  methods: {
    editNote ( id ) {
      const editLink = this.editLink( id );
      this.$router.push({path: editLink});
    },
    getOrders (){
      let self = this;
      axios.get('/api/orders?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.orders = response.data.orders;
      }).catch(function (error) {
        console.log(error);
        // self.$router.push({ path: '/login' });
      });
    },
    checkDate () {
      let self = this
			axios.post('/api/checkDate' + '?token=' + localStorage.getItem("api_token"),
			{
			_method: 'POST',
			date: this.date,
			})
			.then(function (response) {
				self.orders = response.data.orders;
			}).catch(function (error) {
				console.log(error);
				// self.$router.push({ path: '/login' });
			});
    },
    modalOrder (data) {
      this.order = data
      console.log(this.order)
    },
    dataTable() {
      setTimeout(function(){
        $('#table').DataTable(
            {
              pagingType: 'full_numbers',
              pageLength: 5,
              processing: true,
              dom: 'Bfrtip',
              buttons: ['copy', 'csv', 'print']
            }
        );
        },
          1000
      );
    }
  },
  mounted: function(){
    this.getOrders();
    this.dataTable();
  }
}
</script>

<style scoped>
.card-body >>> table > tbody > tr > td {
  cursor: pointer;
}
</style>
