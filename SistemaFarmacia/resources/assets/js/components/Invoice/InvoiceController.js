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
                customError: null
         }
     },
    methods:{
        getDataForShow: function() {
              this.show = true;
              setTimeout(() => {
                    axios.get('/Invoice/getDataForShow')
                   .then( (res) => {
                       // this.pagination = res.data.pagination;
                        this.records = res.data.records;
                        if(this.records.employees.length != 0){
                            this.data.selectedEmployeeId = this.records.employees[0].id;
                        }
                        // if(this.records.products.length != 0){
                        //    // this.data.selectedEmployeeId = this.records.employees[0].id;
                        // }
                        this.show = false;
                   })
                   .catch( (err) => {
                        this.showMessage('Error', this.generalError, this.error);
                        this.show = false;
                   });
              }, this.timeOut);
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
         this.getDataForShow();
     }
}