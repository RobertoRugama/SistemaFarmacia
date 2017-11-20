import loading from 'vue-full-loading'
import utils from '../Helper/Utils'
import moment from 'moment'

export default {
    mixins: [utils],
    components: {
        loading,
        moment,
      },
     data: function(){
         return {
                title: 'Facturacion de Productos',
                dateTemp: null,
                // data api component
                comments: [],
                comment: '',
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
                timeOut: 0
         }
     },
    methods:{
        getComments: function(page) {
              this.show = true;
              setTimeout(() => {
                    axios.get('/Maintenance/' + this.reportId + '/CommentDetails?page='+page)
                   .then( (res) => {
                        this.pagination = res.data.pagination;
                        this.comments = res.data.comments;
                        this.show = false;
                   })
                   .catch( (err) => {
                        this.showMessage('Error', this.generalError, this.error);
                        this.show = false;
                   });
              }, this.timeOut);
        },
        AddComment: function() {
              this.show = true;
               if (!this.comment){
                  this.showMessage('Error', 'Debe escribir un comentario' , this.error);
                  this.show = false;
                  return;
              }
              setTimeout(() => {
                    axios.post('/Maintenance/Comment/Create', {
                        reportId: this.reportId,
                        description: this.comment
                    })
                   .then( (res) => {
                        this.show = false;
                        this.hideModal('AddCommentModal', this.resetCallback);
                        this.showMessage('Mensaje', res.data.message);
                   })
                   .catch( (err) => {
                        this.showMessage('Error', this.generalError, this.error);
                        this.show = false;
                   });
              }, this.timeOut);
        },
        resetCallback: function(){
            this.cleanFields()
            this.pagination.current_page = 1;
            this.getComments(this.pagination.current_page);
        },
        cleanFields: function() {
            this.comment = '';
        }
    },
     mounted () {
         //this.getComments(this.pagination.current_page);
         alert('yes')
     }
}