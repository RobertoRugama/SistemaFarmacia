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
        validateDate: function(date, type = this.datetime, params = this.less){
            // var dateInit =  moment(date).format(this.datetimeFormat);
             var format = type == this.datetime ? this.datetimeFormat : this.timeFormat;
             var today = moment().format(format);
             if (params == this.less){
                if (date > today){
                    return false;
                 }
             }else{
                if (date < today){
                    return false;
                 }
             }

             return true;
        },
        calculateInoperativeTime: function(initId, endId, schedules, days, format = this.customTimeFormat){
            var dateTimeInit = moment($(initId).data("DateTimePicker").date(), this.datetimeFormat);
            var dateTimeFinish = moment($(endId).data("DateTimePicker").date(), this.datetimeFormat);

            var inoperativeTime = calculateInoperative(dateTimeInit, dateTimeFinish, schedules, days,
                                                this.dateFormat, this.timeFormat, this.minutes); 
            return this.customFormatInoperativeTime(inoperativeTime, format);
        },
        customFormatInoperativeTime: function(value, format = this.customTimeFormat){
            var format = format == this.customTimeFormat ? this.customTimeFormat : this.durationTimeFormat;
            return moment.duration(value, this.minutes).format(format);
        },
        dateCustom: function(id, cb, type = this.datetime){
            var format = type == this.time ? this.timeFormat : this.datetimeFormat;
            $(id).datetimepicker({
                useCurrent: true,
				//daysOfWeekDisabled: [0, 6],
                //disabledDates: [
                     //   moment("2017/11/04"),
                       // moment("2017/11/05")
				//	],
                //minDate: moment(),
                format: format,
                defaultDate: moment(),
                maxDate: new Date,
				locale: 'es'

            }).on('dp.change', cb);
        },

        dateMax:function (id, cb, type = this.datetime) {
            var format = type == this.time ? this.timeFormat : this.datetimeFormat;
            $(id).datetimepicker({
                //useCurrent: false,
                //daysOfWeekDisabled: [0, 6],
                //disabledDates: [
                //   moment("2017/11/04"),
                // moment("2017/11/05")
                //	],
                //minDate: moment(),
                format: format,
                defaultDate: moment(),
                locale: 'es'

            }).on('dp.change', cb);
        },

        validateMinAndMaxDate:function (initId, endId,type = this.datetime) {
            var format = type == this.time ? this.timeFormat : this.datetimeFormat;
            var dateTimeInit = moment($(initId).data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'));
            var dateTimeFinish = moment($(endId).data("DateTimePicker").date().format('YYYY-MM-DD HH:mm:ss'));
            if(dateTimeFinish<dateTimeInit)
                $(endId).data("DateTimePicker").date(dateTimeInit);

        },

        getFileName: function(fullPath, showDisk = false) {
            if (fullPath == null | fullPath == undefined) {
                return null;
            }
            var filter = fullPath.split("/");
            return showDisk ? filter[0] : filter[1];
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

  function getDays(initDate, finishDate, schedules ,format){
       
    var dateInit = moment(initDate).format(format);
    var dateFinish = moment(finishDate).format(format);
    var arrayDate = [];
    arrayDate.push(dateInit);

    while(dateFinish != dateInit){
         
        dateInit = moment(moment(dateInit).add(1, 'days')).format(format);
        arrayDate.push(dateInit);
    }
    return arrayDate;
  }

  function getScheduleByDate(arrayDate, schedules, days, initDate, finishDate, timeFormat){
        var sitesSchedule = [];
        arrayDate.forEach(function(date) {
            var indexDay = moment(date).day();
            if(indexDay == 0){
                indexDay = 7;
            }
            var schedulesFilter = schedules.filter(function(item){
                
                var dayInitNumber = days.filter(function(day){
                    return day.id == item.initialday;
                })[0].number;  

                var dayFinishNumber = days.filter(function(day){
                    return day.id == item.finalday;
                })[0].number;
                
                if(dayFinishNumber == 0){
                    dayFinishNumber = 7;
                }
                return indexDay >= dayInitNumber && indexDay <= dayFinishNumber;
              // return indexDay <= final;
            });

            schedulesFilter.forEach(function(item) {
                var scheduleNew = new Object();
                scheduleNew.date = date;
                scheduleNew.initialhour  = item.initialhour;
                scheduleNew.finalhour = item.finalhour;
                sitesSchedule.push(scheduleNew);
            });
        });

        var siteScheduleValidate = sitesSchedule[sitesSchedule.length-1];
        let before = moment(siteScheduleValidate.date + " " + siteScheduleValidate.initialhour);
        let after = moment(siteScheduleValidate.date + " " + siteScheduleValidate.finalhour);
        var timeFinish = moment(finishDate).format(timeFormat)
        initDate = moment(siteScheduleValidate.date + " " + timeFinish)
       // console.log('init = '+JSON.stringify(sitesSchedule));
       
        if (!(moment(initDate).isBetween(before, after, null, '[]'))){
            sitesSchedule.splice(sitesSchedule.length-1, 1);
         }
     
        return sitesSchedule;
  }

  function calculateInoperative(initDate, finishDate, schedules, days, dateFormat, timeFormat, dateDiffFormat){

      var arrayDate = getDays(initDate, finishDate, schedules, dateFormat);
      var sitesSchedule = getScheduleByDate(arrayDate, schedules, days, initDate, finishDate, timeFormat);
      var timeInit = moment(initDate).format(timeFormat);
      var timeFinish = moment(finishDate).format(timeFormat);
      var i = 0 , inoperativeTime = 0;

     sitesSchedule.forEach(function(item) {

          let before = moment(item.date + " " + item.initialhour);
          let after = moment(item.date + " " + item.finalhour);
          initDate = moment(item.date + " " + timeInit);
         
        //   alert(moment(initDate).format('YYYY-MM-DD HH:mm:ss'))
        //   alert(moment(before, 'YYYY-MM-DD HH:mm:ss'))
        //   alert(moment(after, 'YYYY-MM-DD HH:mm:ss'))

         // if (moment(initDate).isBetween(before, after, null, '[]')){ 
              if(sitesSchedule.length == 1){
                  finishDate = moment(item.date + " " + timeFinish); 
                //   alert(moment(finishDate, 'YYYY-MM-DD HH:mm:ss'))
                //   alert(moment(initDate, 'YYYY-MM-DD HH:mm:ss'))
                //   alert('if first length is 1 = '+dateDiff(initDate, finishDate, dateDiffFormat)) 
                  inoperativeTime += dateDiff(initDate, finishDate, dateDiffFormat);    
              }
              else if(i == sitesSchedule.length - 1){
                  initDate = moment(item.date + " " + timeFinish);  
                //   alert(moment(initDate, 'YYYY-MM-DD HH:mm:ss'))
                //   alert(moment(before, 'YYYY-MM-DD HH:mm:ss'))
                //   alert('if first = '+dateDiff(before, initDate, dateDiffFormat)) 
                  inoperativeTime += dateDiff(before, initDate, dateDiffFormat);    
              }else if(inoperativeTime == 0){
                //alert('else if last = '+dateDiff(initDate, after, dateDiffFormat))
                inoperativeTime += dateDiff(initDate, after, dateDiffFormat);
              }else{
                 //alert('else last = '+dateDiff(before, after, dateDiffFormat));   
                  inoperativeTime += dateDiff(before, after, dateDiffFormat);
              }
          //}
          
        //   else{
        //       //alert('else ext = '+dateDiff(before, after, dateDiffFormat));
        //       inoperativeTime += dateDiff(before, after, dateDiffFormat);  
        //   }
            i++;
     });

     return inoperativeTime;
  }