import moment from 'moment'

export default {
    components: {
        moment,
      },
    data(){
        return {
            success: 'success',
            error: 'error',
            info: 'info',
            warning: 'warning',
            date: 1,
            datetime: 2,
            time: 3,
            setDateFormat: 'DD/MM/YYYY HH:mm:ss',
            datetimeFormat: 'YYYY-MM-DD HH:mm:ss',
            dateFormat: 'YYYY-MM-DD',
            timeFormat: 'HH:mm',
            durationTimeFormat: 'h:mm',
            customTimeFormat: 'h [hrs], m [min]',
            minutes: 'minutes',
            more: '>=',
            less: '<='
        }
    },
    methods: {
      redirect (response) {
        window.location.reload()
      },
      renderModal: function(modalId, cb = null) {
            $('#' + modalId).modal({
                backdrop: "static",
                keyboard: true
            });
            if (cb != null) {
                cb();		
            }		
        },
        hideModal: function(modalId, cb = null) {
            $('#' + modalId).modal("hide");
            if (cb != null) {
              cb();		
            }
        },
        showMessage: function(title, message, type = 'success', timeOut = 4000){
            toastr.options = {
                "closeButton": true,
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": timeOut,
            }
            switch(type) {
                case this.error:
                      toastr.error(message, title == null | undefined ? 'Mensaje de ' + this.error : title);
                    break;
                case this.success:
                     toastr.success(message, title == null | undefined ? 'Mensaje de ' + this.success : title);
                    break;
                case this.info:
                    toastr.info(message,  title == null | undefined ? 'Mensaje de '+ this.info : title);
                    break;
                default:
                  toastr.warning(message,  title == null | undefined ? 'Mensaje de '+ this.warning : title);
            }           
        }
    }
  }

  function dateDiff(init, finish, format){
     return finish.diff(init, format);
  }