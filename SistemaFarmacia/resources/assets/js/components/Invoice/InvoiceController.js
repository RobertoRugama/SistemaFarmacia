import loading from 'vue-full-loading'
import utils from '../Helper/Utils'
import states from '../Helper/Utils'
import moment from 'moment'

export default {
    mixins: [utils,states],
    components: {
        loading,
        moment,
      },
     data: function(){
         return {
                title: 'Facturacion de Productos',
                // data api component
                records: {
                    products: [],
                },
                data: {
                    selectedEmployeeId: null,
                    customerName: '',
                    products: []
                },
                selectedProductId: null,
                selectedQuantity: null,
                productDescriptionModal: '',
                // data pagination component
                counter: 0,
                pagination: {
                    total: 0,
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
                offset: 4,
                // data loading component
                show: false,
                label: '',
                timeOut: 0,
                customError: null,
                isRunFirst: false,
                tabIndex: 1,
         }
     },
    methods:{
        selectTab:  function (tabIndex) {
            this.tabIndex = tabIndex;
        },
        getDataForShow: function(page) {
              var vm = this;
              vm.show = true;
              setTimeout(() => {
                    axios.get('/Invoice/getDataForShow?page='+page)
                   .then( (res) => {
                        vm.records = res.data.records;
                        vm.pagination = vm.records.products;
                        vm.records.products = vm.pagination.data;
                        if(vm.isRunFirst){
                            if(vm.records.employees.length != 0){
                                vm.data.selectedEmployeeId = vm.records.employees[0].id;
                            }
                            vm.isRunFirst = false;
                        }else{
                            vm.hasProductInList(vm.records.products);
                        }
                        vm.show = false;
                   })
                   .catch( (err) => {
                       alert(err)
                        vm.showMessage('Error', vm.generalError, vm.error);
                        vm.show = false;
                   });
              }, vm.timeOut);
        },
        addProduct: function(modalId){
            var vm = this;
            vm.buildProductJson(vm.selectedProductId, vm.selectedQuantity);
            vm.hideModal(modalId);
        },
        buildProductJson: function(productId, quantity){
            
            let selectedProduct = this.data.products.filter(function(item){
                return productId == item.id;
            })[0];

            if(selectedProduct == null){
                selectedProduct = this.records.products.filter(function(product){
                    return product.id == productId;
                })[0];
                selectedProduct.quantity = parseInt(quantity);             
            }else{
                selectedProduct.quantity += parseInt(quantity);
                for(var index in this.data.products){
                    if(this.data.products[index].id == productId){
                        this.data.products.splice(index, 1);
                        break;
                    }
                }
            }
            selectedProduct.subtotal = selectedProduct.quantity * selectedProduct.unit_price;
            selectedProduct.tax = selectedProduct.subtotal * 0.15;
            selectedProduct.total = selectedProduct.subtotal + selectedProduct.tax;
            this.data.products.push(selectedProduct);
            this.selectedQuantity = '';
            this.hasProductInList(this.data.products);
        },
        removeProduct: function(id){
            this.data.products = this.data.products.filter(function(product){
                return product.id != id;
            });
            this.hasProductInList(this.records.products);
        },
        showModalProduct: function(productId, modalId){
            this.selectedProductId = productId;
            let filterProduct = this.records.products.filter(function(product){
                return product.id == productId;
            })[0];
            this.productDescriptionModal = filterProduct.name + ' en ' + filterProduct.presentation + ', ' + filterProduct.description;
            this.renderModal(modalId);
        },
        buildInvoiceProductsJson: function(products){
            var productJson = [];
            for(var index in products){
                productJson.push({
                    id: products[index].id,
                    unitPrice: products[index].unit_price,
                    quantity: products[index].quantity,
                    subtotal: products[index].subtotal,
                    tax: products[index].tax,
                    total: products[index].total,
                });
            }
            return productJson;
        },
        invoiceProducts: function() {
            var vm = this;
            console.log(JSON.stringify(vm.buildInvoiceProductsJson(vm.data.products)))
            vm.show = true;
            setTimeout(() => {
                  axios.post('/Invoice', {
                      selectedEmployeeId: vm.data.selectedEmployeeId,
                      customerName: vm.data.customerName,
                      products: vm.buildInvoiceProductsJson(vm.data.products),
                      generalSubtotal: vm.subtotal,
                      generalTax: vm.tax,
                      generalTotal: vm.total,
                  })
                 .then( (res) => {
                      this.resetCallback()
                      alert('facturado...')
                      vm.show = false;
                 })
                 .catch( (err) => {                 
                      vm.show = false;
                      alert(err)
                  //    vm.showMessage('Error', vm.generalError, vm.error);
                 });
            }, vm.timeOut);
         },
        resetCallback: function(){
           this.cleanFields()
           this.pagination.current_page = 1;
           this.getDataForShow(this.pagination.current_page);
        },
        cleanFields: function() {
            this.data.products = [];
            this.records.products = [];
            this.isRunFirst = true
            this.records.customerName = ''
        },   
        hasProductInList: function(products){
            if(this.data.products.length > 0){
                var count = -1;
                for(var i = 0; i < this.data.products.length; i++){
                    for(var j = 0; j < products.length; j++){
                        if(products[j].id == this.data.products[i].id){
                            products[j].hasList = true;
                            count = j;
                        }else if(j > count){
                            products[j].hasList = false;
                        }
                    }
                }
            }else{
                for(var j = 0; j < products.length; j++){
                    products[j].hasList = false;
                }
            }
       }
    },
    computed:{
        subtotal: function(){
            var subtotal = 0.0;
            for(var index in this.data.products){
                subtotal += this.data.products[index].unit_price * this.data.products[index].quantity;
            }
            return subtotal;
        },
        tax: function(){
            return this.subtotal * 0.15;
        },
        total: function(){
            return this.subtotal + this.tax;
        },
    },
     mounted () {
         this.isRunFirst = true;
         this.getDataForShow(this.pagination.current_page);
     }
}