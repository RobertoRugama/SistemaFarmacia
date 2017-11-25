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
                product: {
                    id: null,
                    quantity: null,
                    unit_price: null,
                    subtotal: null,
                    tax: null,
                    total: null,
                },
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
                        }
                        vm.show = false;
                   })
                   .catch( (err) => {
                        vm.showMessage('Error', vm.generalError, vm.error);
                        vm.show = false;
                   });
              }, vm.timeOut);
        },
        addProduct: function(id){
            let selectedProduct = this.records.products.filter(function(product){
                return product.id == id;
            });
            this.data.products.push(selectedProduct[0]);
        },
        invoiceProducts: function() {
             
        },
        resetCallback: function(){
            this.cleanFields()
           // this.pagination.current_page = 1;
           // this.getDataForShow(this.pagination.current_page);
        },
        cleanFields: function() {
           // this.comment = '';
        }
    },
     mounted () {
         this.isRunFirst = true;
         this.getDataForShow(this.pagination.current_page);
     }
}