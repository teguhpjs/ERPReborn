/**
* @version: 3.1
* @author: Dan Grossman http://www.dangrossman.info/
* @copyright: Copyright (c) 2012-2019 Dan Grossman. All rights reserved.
* @license: Licensed under the MIT license. See http://www.opensource.org/licenses/mit-license.php
* @website: http://www.daterangepicker.com/
*/
(function(root,factory){if(typeof define==='function'&&define.amd){define(['moment','jquery'],function(moment,jquery){if(!jquery.fn)jquery.fn={};if(typeof moment!=='function'&&moment.hasOwnProperty('default'))moment=moment['default']
return factory(moment,jquery);})}else if(typeof module==='object'&&module.exports){var jQuery=(typeof window!='undefined')?window.jQuery:undefined;if(!jQuery){jQuery=require('jquery');if(!jQuery.fn)jQuery.fn={}}
var moment=(typeof window!='undefined'&&typeof window.moment!='undefined')?window.moment:require('moment');module.exports=factory(moment,jQuery)}else{root.daterangepicker=factory(root.moment,root.jQuery)}}(this,function(moment,$){var DateRangePicker=function(element,options,cb){this.parentEl='body';this.element=$(element);this.startDate=moment().startOf('day');this.endDate=moment().endOf('day');this.minDate=!1;this.maxDate=!1;this.maxSpan=!1;this.autoApply=!1;this.singleDatePicker=!1;this.showDropdowns=!1;this.minYear=moment().subtract(100,'year').format('YYYY');this.maxYear=moment().add(100,'year').format('YYYY');this.showWeekNumbers=!1;this.showISOWeekNumbers=!1;this.showCustomRangeLabel=!0;this.timePicker=!1;this.timePicker24Hour=!1;this.timePickerIncrement=1;this.timePickerSeconds=!1;this.linkedCalendars=!0;this.autoUpdateInput=!0;this.alwaysShowCalendars=!1;this.ranges={};this.opens='right';if(this.element.hasClass('pull-right'))
this.opens='left';this.drops='down';if(this.element.hasClass('dropup'))
this.drops='up';this.buttonClasses='btn btn-sm';this.applyButtonClasses='btn-primary';this.cancelButtonClasses='btn-default';this.locale={direction:'ltr',format:moment.localeData().longDateFormat('L'),separator:' - ',applyLabel:'Apply',cancelLabel:'Cancel',weekLabel:'W',customRangeLabel:'Custom Range',daysOfWeek:moment.weekdaysMin(),monthNames:moment.monthsShort(),firstDay:moment.localeData().firstDayOfWeek()};this.callback=function(){};this.isShowing=!1;this.leftCalendar={};this.rightCalendar={};if(typeof options!=='object'||options===null)
options={};options=$.extend(this.element.data(),options);if(typeof options.template!=='string'&&!(options.template instanceof $))
options.template='<div class="daterangepicker">'+'<div class="ranges"></div>'+'<div class="drp-calendar left">'+'<div class="calendar-table"></div>'+'<div class="calendar-time"></div>'+'</div>'+'<div class="drp-calendar right">'+'<div class="calendar-table"></div>'+'<div class="calendar-time"></div>'+'</div>'+'<div class="drp-buttons">'+'<span class="drp-selected"></span>'+'<button class="cancelBtn" type="button"></button>'+'<button class="applyBtn" disabled="disabled" type="button"></button> '+'</div>'+'</div>';this.parentEl=(options.parentEl&&$(options.parentEl).length)?$(options.parentEl):$(this.parentEl);this.container=$(options.template).appendTo(this.parentEl);if(typeof options.locale==='object'){if(typeof options.locale.direction==='string')
this.locale.direction=options.locale.direction;if(typeof options.locale.format==='string')
this.locale.format=options.locale.format;if(typeof options.locale.separator==='string')
this.locale.separator=options.locale.separator;if(typeof options.locale.daysOfWeek==='object')
this.locale.daysOfWeek=options.locale.daysOfWeek.slice();if(typeof options.locale.monthNames==='object')
this.locale.monthNames=options.locale.monthNames.slice();if(typeof options.locale.firstDay==='number')
this.locale.firstDay=options.locale.firstDay;if(typeof options.locale.applyLabel==='string')
this.locale.applyLabel=options.locale.applyLabel;if(typeof options.locale.cancelLabel==='string')
this.locale.cancelLabel=options.locale.cancelLabel;if(typeof options.locale.weekLabel==='string')
this.locale.weekLabel=options.locale.weekLabel;if(typeof options.locale.customRangeLabel==='string'){var elem=document.createElement('textarea');elem.innerHTML=options.locale.customRangeLabel;var rangeHtml=elem.value;this.locale.customRangeLabel=rangeHtml}}
this.container.addClass(this.locale.direction);if(typeof options.startDate==='string')
this.startDate=moment(options.startDate,this.locale.format);if(typeof options.endDate==='string')
this.endDate=moment(options.endDate,this.locale.format);if(typeof options.minDate==='string')
this.minDate=moment(options.minDate,this.locale.format);if(typeof options.maxDate==='string')
this.maxDate=moment(options.maxDate,this.locale.format);if(typeof options.startDate==='object')
this.startDate=moment(options.startDate);if(typeof options.endDate==='object')
this.endDate=moment(options.endDate);if(typeof options.minDate==='object')
this.minDate=moment(options.minDate);if(typeof options.maxDate==='object')
this.maxDate=moment(options.maxDate);if(this.minDate&&this.startDate.isBefore(this.minDate))
this.startDate=this.minDate.clone();if(this.maxDate&&this.endDate.isAfter(this.maxDate))
this.endDate=this.maxDate.clone();if(typeof options.applyButtonClasses==='string')
this.applyButtonClasses=options.applyButtonClasses;if(typeof options.applyClass==='string')
this.applyButtonClasses=options.applyClass;if(typeof options.cancelButtonClasses==='string')
this.cancelButtonClasses=options.cancelButtonClasses;if(typeof options.cancelClass==='string')
this.cancelButtonClasses=options.cancelClass;if(typeof options.maxSpan==='object')
this.maxSpan=options.maxSpan;if(typeof options.dateLimit==='object')
this.maxSpan=options.dateLimit;if(typeof options.opens==='string')
this.opens=options.opens;if(typeof options.drops==='string')
this.drops=options.drops;if(typeof options.showWeekNumbers==='boolean')
this.showWeekNumbers=options.showWeekNumbers;if(typeof options.showISOWeekNumbers==='boolean')
this.showISOWeekNumbers=options.showISOWeekNumbers;if(typeof options.buttonClasses==='string')
this.buttonClasses=options.buttonClasses;if(typeof options.buttonClasses==='object')
this.buttonClasses=options.buttonClasses.join(' ');if(typeof options.showDropdowns==='boolean')
this.showDropdowns=options.showDropdowns;if(typeof options.minYear==='number')
this.minYear=options.minYear;if(typeof options.maxYear==='number')
this.maxYear=options.maxYear;if(typeof options.showCustomRangeLabel==='boolean')
this.showCustomRangeLabel=options.showCustomRangeLabel;if(typeof options.singleDatePicker==='boolean'){this.singleDatePicker=options.singleDatePicker;if(this.singleDatePicker)
this.endDate=this.startDate.clone();}
if(typeof options.timePicker==='boolean')
this.timePicker=options.timePicker;if(typeof options.timePickerSeconds==='boolean')
this.timePickerSeconds=options.timePickerSeconds;if(typeof options.timePickerIncrement==='number')
this.timePickerIncrement=options.timePickerIncrement;if(typeof options.timePicker24Hour==='boolean')
this.timePicker24Hour=options.timePicker24Hour;if(typeof options.autoApply==='boolean')
this.autoApply=options.autoApply;if(typeof options.autoUpdateInput==='boolean')
this.autoUpdateInput=options.autoUpdateInput;if(typeof options.linkedCalendars==='boolean')
this.linkedCalendars=options.linkedCalendars;if(typeof options.isInvalidDate==='function')
this.isInvalidDate=options.isInvalidDate;if(typeof options.isCustomDate==='function')
this.isCustomDate=options.isCustomDate;if(typeof options.alwaysShowCalendars==='boolean')
this.alwaysShowCalendars=options.alwaysShowCalendars;if(this.locale.firstDay!=0){var iterator=this.locale.firstDay;while(iterator>0){this.locale.daysOfWeek.push(this.locale.daysOfWeek.shift());iterator--}}
var start,end,range;if(typeof options.startDate==='undefined'&&typeof options.endDate==='undefined'){if($(this.element).is(':text')){var val=$(this.element).val(),split=val.split(this.locale.separator);start=end=null;if(split.length==2){start=moment(split[0],this.locale.format);end=moment(split[1],this.locale.format)}else if(this.singleDatePicker&&val!==""){start=moment(val,this.locale.format);end=moment(val,this.locale.format)}
if(start!==null&&end!==null){this.setStartDate(start);this.setEndDate(end)}}}
if(typeof options.ranges==='object'){for(range in options.ranges){if(typeof options.ranges[range][0]==='string')
start=moment(options.ranges[range][0],this.locale.format);else start=moment(options.ranges[range][0]);if(typeof options.ranges[range][1]==='string')
end=moment(options.ranges[range][1],this.locale.format);else end=moment(options.ranges[range][1]);if(this.minDate&&start.isBefore(this.minDate))
start=this.minDate.clone();var maxDate=this.maxDate;if(this.maxSpan&&maxDate&&start.clone().add(this.maxSpan).isAfter(maxDate))
maxDate=start.clone().add(this.maxSpan);if(maxDate&&end.isAfter(maxDate))
end=maxDate.clone();if((this.minDate&&end.isBefore(this.minDate,this.timepicker?'minute':'day'))||(maxDate&&start.isAfter(maxDate,this.timepicker?'minute':'day')))
continue;var elem=document.createElement('textarea');elem.innerHTML=range;var rangeHtml=elem.value;this.ranges[rangeHtml]=[start,end]}
var list='<ul>';for(range in this.ranges){list+='<li data-range-key="'+range+'">'+range+'</li>'}
if(this.showCustomRangeLabel){list+='<li data-range-key="'+this.locale.customRangeLabel+'">'+this.locale.customRangeLabel+'</li>'}
list+='</ul>';this.container.find('.ranges').prepend(list)}
if(typeof cb==='function'){this.callback=cb}
if(!this.timePicker){this.startDate=this.startDate.startOf('day');this.endDate=this.endDate.endOf('day');this.container.find('.calendar-time').hide()}
if(this.timePicker&&this.autoApply)
this.autoApply=!1;if(this.autoApply){this.container.addClass('auto-apply')}
if(typeof options.ranges==='object')
this.container.addClass('show-ranges');if(this.singleDatePicker){this.container.addClass('single');this.container.find('.drp-calendar.left').addClass('single');this.container.find('.drp-calendar.left').show();this.container.find('.drp-calendar.right').hide();if(!this.timePicker&&this.autoApply){this.container.addClass('auto-apply')}}
if((typeof options.ranges==='undefined'&&!this.singleDatePicker)||this.alwaysShowCalendars){this.container.addClass('show-calendar')}
this.container.addClass('opens'+this.opens);this.container.find('.applyBtn, .cancelBtn').addClass(this.buttonClasses);if(this.applyButtonClasses.length)
this.container.find('.applyBtn').addClass(this.applyButtonClasses);if(this.cancelButtonClasses.length)
this.container.find('.cancelBtn').addClass(this.cancelButtonClasses);this.container.find('.applyBtn').html(this.locale.applyLabel);this.container.find('.cancelBtn').html(this.locale.cancelLabel);this.container.find('.drp-calendar').on('click.daterangepicker','.prev',$.proxy(this.clickPrev,this)).on('click.daterangepicker','.next',$.proxy(this.clickNext,this)).on('mousedown.daterangepicker','td.available',$.proxy(this.clickDate,this)).on('mouseenter.daterangepicker','td.available',$.proxy(this.hoverDate,this)).on('change.daterangepicker','select.yearselect',$.proxy(this.monthOrYearChanged,this)).on('change.daterangepicker','select.monthselect',$.proxy(this.monthOrYearChanged,this)).on('change.daterangepicker','select.hourselect,select.minuteselect,select.secondselect,select.ampmselect',$.proxy(this.timeChanged,this));this.container.find('.ranges').on('click.daterangepicker','li',$.proxy(this.clickRange,this));this.container.find('.drp-buttons').on('click.daterangepicker','button.applyBtn',$.proxy(this.clickApply,this)).on('click.daterangepicker','button.cancelBtn',$.proxy(this.clickCancel,this));if(this.element.is('input')||this.element.is('button')){this.element.on({'click.daterangepicker':$.proxy(this.show,this),'focus.daterangepicker':$.proxy(this.show,this),'keyup.daterangepicker':$.proxy(this.elementChanged,this),'keydown.daterangepicker':$.proxy(this.keydown,this)})}else{this.element.on('click.daterangepicker',$.proxy(this.toggle,this));this.element.on('keydown.daterangepicker',$.proxy(this.toggle,this))}
this.updateElement()};DateRangePicker.prototype={constructor:DateRangePicker,setStartDate:function(startDate){if(typeof startDate==='string')
this.startDate=moment(startDate,this.locale.format);if(typeof startDate==='object')
this.startDate=moment(startDate);if(!this.timePicker)
this.startDate=this.startDate.startOf('day');if(this.timePicker&&this.timePickerIncrement)
this.startDate.minute(Math.round(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement);if(this.minDate&&this.startDate.isBefore(this.minDate)){this.startDate=this.minDate.clone();if(this.timePicker&&this.timePickerIncrement)
this.startDate.minute(Math.round(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement);}
if(this.maxDate&&this.startDate.isAfter(this.maxDate)){this.startDate=this.maxDate.clone();if(this.timePicker&&this.timePickerIncrement)
this.startDate.minute(Math.floor(this.startDate.minute()/this.timePickerIncrement)*this.timePickerIncrement);}
if(!this.isShowing)
this.updateElement();this.updateMonthsInView()},setEndDate:function(endDate){if(typeof endDate==='string')
this.endDate=moment(endDate,this.locale.format);if(typeof endDate==='object')
this.endDate=moment(endDate);if(!this.timePicker)
this.endDate=this.endDate.endOf('day');if(this.timePicker&&this.timePickerIncrement)
this.endDate.minute(Math.round(this.endDate.minute()/this.timePickerIncrement)*this.timePickerIncrement);if(this.endDate.isBefore(this.startDate))
this.endDate=this.startDate.clone();if(this.maxDate&&this.endDate.isAfter(this.maxDate))
this.endDate=this.maxDate.clone();if(this.maxSpan&&this.startDate.clone().add(this.maxSpan).isBefore(this.endDate))
this.endDate=this.startDate.clone().add(this.maxSpan);this.previousRightTime=this.endDate.clone();this.container.find('.drp-selected').html(this.startDate.format(this.locale.format)+this.locale.separator+this.endDate.format(this.locale.format));if(!this.isShowing)
this.updateElement();this.updateMonthsInView()},isInvalidDate:function(){return!1},isCustomDate:function(){return!1},updateView:function(){if(this.timePicker){this.renderTimePicker('left');this.renderTimePicker('right');if(!this.endDate){this.container.find('.right .calendar-time select').prop('disabled',!0).addClass('disabled')}else{this.container.find('.right .calendar-time select').prop('disabled',!1).removeClass('disabled')}}
if(this.endDate)
this.container.find('.drp-selected').html(this.startDate.format(this.locale.format)+this.locale.separator+this.endDate.format(this.locale.format));this.updateMonthsInView();this.updateCalendars();this.updateFormInputs()},updateMonthsInView:function(){if(this.endDate){if(!this.singleDatePicker&&this.leftCalendar.month&&this.rightCalendar.month&&(this.startDate.format('YYYY-MM')==this.leftCalendar.month.format('YYYY-MM')||this.startDate.format('YYYY-MM')==this.rightCalendar.month.format('YYYY-MM'))&&(this.endDate.format('YYYY-MM')==this.leftCalendar.month.format('YYYY-MM')||this.endDate.format('YYYY-MM')==this.rightCalendar.month.format('YYYY-MM'))){return}
this.leftCalendar.month=this.startDate.clone().date(2);if(!this.linkedCalendars&&(this.endDate.month()!=this.startDate.month()||this.endDate.year()!=this.startDate.year())){this.rightCalendar.month=this.endDate.clone().date(2)}else{this.rightCalendar.month=this.startDate.clone().date(2).add(1,'month')}}else{if(this.leftCalendar.month.format('YYYY-MM')!=this.startDate.format('YYYY-MM')&&this.rightCalendar.month.format('YYYY-MM')!=this.startDate.format('YYYY-MM')){this.leftCalendar.month=this.startDate.clone().date(2);this.rightCalendar.month=this.startDate.clone().date(2).add(1,'month')}}
if(this.maxDate&&this.linkedCalendars&&!this.singleDatePicker&&this.rightCalendar.month>this.maxDate){this.rightCalendar.month=this.maxDate.clone().date(2);this.leftCalendar.month=this.maxDate.clone().date(2).subtract(1,'month')}},updateCalendars:function(){if(this.timePicker){var hour,minute,second;if(this.endDate){hour=parseInt(this.container.find('.left .hourselect').val(),10);minute=parseInt(this.container.find('.left .minuteselect').val(),10);if(isNaN(minute)){minute=parseInt(this.container.find('.left .minuteselect option:last').val(),10)}
second=this.timePickerSeconds?parseInt(this.container.find('.left .secondselect').val(),10):0;if(!this.timePicker24Hour){var ampm=this.container.find('.left .ampmselect').val();if(ampm==='PM'&&hour<12)
hour+=12;if(ampm==='AM'&&hour===12)
hour=0}}else{hour=parseInt(this.container.find('.right .hourselect').val(),10);minute=parseInt(this.container.find('.right .minuteselect').val(),10);if(isNaN(minute)){minute=parseInt(this.container.find('.right .minuteselect option:last').val(),10)}
second=this.timePickerSeconds?parseInt(this.container.find('.right .secondselect').val(),10):0;if(!this.timePicker24Hour){var ampm=this.container.find('.right .ampmselect').val();if(ampm==='PM'&&hour<12)
hour+=12;if(ampm==='AM'&&hour===12)
hour=0}}
this.leftCalendar.month.hour(hour).minute(minute).second(second);this.rightCalendar.month.hour(hour).minute(minute).second(second)}
this.renderCalendar('left');this.renderCalendar('right');this.container.find('.ranges li').removeClass('active');if(this.endDate==null)return;this.calculateChosenLabel()},renderCalendar:function(side){var calendar=side=='left'?this.leftCalendar:this.rightCalendar;var month=calendar.month.month();var year=calendar.month.year();var hour=calendar.month.hour();var minute=calendar.month.minute();var second=calendar.month.second();var daysInMonth=moment([year,month]).daysInMonth();var firstDay=moment([year,month,1]);var lastDay=moment([year,month,daysInMonth]);var lastMonth=moment(firstDay).subtract(1,'month').month();var lastYear=moment(firstDay).subtract(1,'month').year();var daysInLastMonth=moment([lastYear,lastMonth]).daysInMonth();var dayOfWeek=firstDay.day();var calendar=[];calendar.firstDay=firstDay;calendar.lastDay=lastDay;for(var i=0;i<6;i++){calendar[i]=[]}
var startDay=daysInLastMonth-dayOfWeek+this.locale.firstDay+1;if(startDay>daysInLastMonth)
startDay-=7;if(dayOfWeek==this.locale.firstDay)
startDay=daysInLastMonth-6;var curDate=moment([lastYear,lastMonth,startDay,12,minute,second]);var col,row;for(var i=0,col=0,row=0;i<42;i++,col++,curDate=moment(curDate).add(24,'hour')){if(i>0&&col%7===0){col=0;row++}
calendar[row][col]=curDate.clone().hour(hour).minute(minute).second(second);curDate.hour(12);if(this.minDate&&calendar[row][col].format('YYYY-MM-DD')==this.minDate.format('YYYY-MM-DD')&&calendar[row][col].isBefore(this.minDate)&&side=='left'){calendar[row][col]=this.minDate.clone()}
if(this.maxDate&&calendar[row][col].format('YYYY-MM-DD')==this.maxDate.format('YYYY-MM-DD')&&calendar[row][col].isAfter(this.maxDate)&&side=='right'){calendar[row][col]=this.maxDate.clone()}}
if(side=='left'){this.leftCalendar.calendar=calendar}else{this.rightCalendar.calendar=calendar}
var minDate=side=='left'?this.minDate:this.startDate;var maxDate=this.maxDate;var selected=side=='left'?this.startDate:this.endDate;var arrow=this.locale.direction=='ltr'?{left:'chevron-left',right:'chevron-right'}:{left:'chevron-right',right:'chevron-left'};var html='<table class="table-condensed">';html+='<thead>';html+='<tr>';if(this.showWeekNumbers||this.showISOWeekNumbers)
html+='<th></th>';if((!minDate||minDate.isBefore(calendar.firstDay))&&(!this.linkedCalendars||side=='left')){html+='<th class="prev available"><span></span></th>'}else{html+='<th></th>'}
var dateHtml=this.locale.monthNames[calendar[1][1].month()]+calendar[1][1].format(" YYYY");if(this.showDropdowns){var currentMonth=calendar[1][1].month();var currentYear=calendar[1][1].year();var maxYear=(maxDate&&maxDate.year())||(this.maxYear);var minYear=(minDate&&minDate.year())||(this.minYear);var inMinYear=currentYear==minYear;var inMaxYear=currentYear==maxYear;var monthHtml='<select class="monthselect">';for(var m=0;m<12;m++){if((!inMinYear||(minDate&&m>=minDate.month()))&&(!inMaxYear||(maxDate&&m<=maxDate.month()))){monthHtml+="<option value='"+m+"'"+(m===currentMonth?" selected='selected'":"")+">"+this.locale.monthNames[m]+"</option>"}else{monthHtml+="<option value='"+m+"'"+(m===currentMonth?" selected='selected'":"")+" disabled='disabled'>"+this.locale.monthNames[m]+"</option>"}}
monthHtml+="</select>";var yearHtml='<select class="yearselect">';for(var y=minYear;y<=maxYear;y++){yearHtml+='<option value="'+y+'"'+(y===currentYear?' selected="selected"':'')+'>'+y+'</option>'}
yearHtml+='</select>';dateHtml=monthHtml+yearHtml}
html+='<th colspan="5" class="month">'+dateHtml+'</th>';if((!maxDate||maxDate.isAfter(calendar.lastDay))&&(!this.linkedCalendars||side=='right'||this.singleDatePicker)){html+='<th class="next available"><span></span></th>'}else{html+='<th></th>'}
html+='</tr>';html+='<tr>';if(this.showWeekNumbers||this.showISOWeekNumbers)
html+='<th class="week">'+this.locale.weekLabel+'</th>';$.each(this.locale.daysOfWeek,function(index,dayOfWeek){html+='<th>'+dayOfWeek+'</th>'});html+='</tr>';html+='</thead>';html+='<tbody>';if(this.endDate==null&&this.maxSpan){var maxLimit=this.startDate.clone().add(this.maxSpan).endOf('day');if(!maxDate||maxLimit.isBefore(maxDate)){maxDate=maxLimit}}
for(var row=0;row<6;row++){html+='<tr>';if(this.showWeekNumbers)
html+='<td class="week">'+calendar[row][0].week()+'</td>';else if(this.showISOWeekNumbers)
html+='<td class="week">'+calendar[row][0].isoWeek()+'</td>';for(var col=0;col<7;col++){var classes=[];if(calendar[row][col].isSame(new Date(),"day"))
classes.push('today');if(calendar[row][col].isoWeekday()>5)
classes.push('weekend');if(calendar[row][col].month()!=calendar[1][1].month())
classes.push('off','ends');if(this.minDate&&calendar[row][col].isBefore(this.minDate,'day'))
classes.push('off','disabled');if(maxDate&&calendar[row][col].isAfter(maxDate,'day'))
classes.push('off','disabled');if(this.isInvalidDate(calendar[row][col]))
classes.push('off','disabled');if(calendar[row][col].format('YYYY-MM-DD')==this.startDate.format('YYYY-MM-DD'))
classes.push('active','start-date');if(this.endDate!=null&&calendar[row][col].format('YYYY-MM-DD')==this.endDate.format('YYYY-MM-DD'))
classes.push('active','end-date');if(this.endDate!=null&&calendar[row][col]>this.startDate&&calendar[row][col]<this.endDate)
classes.push('in-range');var isCustom=this.isCustomDate(calendar[row][col]);if(isCustom!==!1){if(typeof isCustom==='string')
classes.push(isCustom);else Array.prototype.push.apply(classes,isCustom)}
var cname='',disabled=!1;for(var i=0;i<classes.length;i++){cname+=classes[i]+' ';if(classes[i]=='disabled')
disabled=!0}
if(!disabled)
cname+='available';html+='<td class="'+cname.replace(/^\s+|\s+$/g,'')+'" data-title="'+'r'+row+'c'+col+'">'+calendar[row][col].date()+'</td>'}
html+='</tr>'}
html+='</tbody>';html+='</table>';this.container.find('.drp-calendar.'+side+' .calendar-table').html(html)},renderTimePicker:function(side){if(side=='right'&&!this.endDate)return;var html,selected,minDate,maxDate=this.maxDate;if(this.maxSpan&&(!this.maxDate||this.startDate.clone().add(this.maxSpan).isBefore(this.maxDate)))
maxDate=this.startDate.clone().add(this.maxSpan);if(side=='left'){selected=this.startDate.clone();minDate=this.minDate}else if(side=='right'){selected=this.endDate.clone();minDate=this.startDate;var timeSelector=this.container.find('.drp-calendar.right .calendar-time');if(timeSelector.html()!=''){selected.hour(!isNaN(selected.hour())?selected.hour():timeSelector.find('.hourselect option:selected').val());selected.minute(!isNaN(selected.minute())?selected.minute():timeSelector.find('.minuteselect option:selected').val());selected.second(!isNaN(selected.second())?selected.second():timeSelector.find('.secondselect option:selected').val());if(!this.timePicker24Hour){var ampm=timeSelector.find('.ampmselect option:selected').val();if(ampm==='PM'&&selected.hour()<12)
selected.hour(selected.hour()+12);if(ampm==='AM'&&selected.hour()===12)
selected.hour(0);}}
if(selected.isBefore(this.startDate))
selected=this.startDate.clone();if(maxDate&&selected.isAfter(maxDate))
selected=maxDate.clone();}
html='<select class="hourselect">';var start=this.timePicker24Hour?0:1;var end=this.timePicker24Hour?23:12;for(var i=start;i<=end;i++){var i_in_24=i;if(!this.timePicker24Hour)
i_in_24=selected.hour()>=12?(i==12?12:i+12):(i==12?0:i);var time=selected.clone().hour(i_in_24);var disabled=!1;if(minDate&&time.minute(59).isBefore(minDate))
disabled=!0;if(maxDate&&time.minute(0).isAfter(maxDate))
disabled=!0;if(i_in_24==selected.hour()&&!disabled){html+='<option value="'+i+'" selected="selected">'+i+'</option>'}else if(disabled){html+='<option value="'+i+'" disabled="disabled" class="disabled">'+i+'</option>'}else{html+='<option value="'+i+'">'+i+'</option>'}}
html+='</select> ';html+=': <select class="minuteselect">';for(var i=0;i<60;i+=this.timePickerIncrement){var padded=i<10?'0'+i:i;var time=selected.clone().minute(i);var disabled=!1;if(minDate&&time.second(59).isBefore(minDate))
disabled=!0;if(maxDate&&time.second(0).isAfter(maxDate))
disabled=!0;if(selected.minute()==i&&!disabled){html+='<option value="'+i+'" selected="selected">'+padded+'</option>'}else if(disabled){html+='<option value="'+i+'" disabled="disabled" class="disabled">'+padded+'</option>'}else{html+='<option value="'+i+'">'+padded+'</option>'}}
html+='</select> ';if(this.timePickerSeconds){html+=': <select class="secondselect">';for(var i=0;i<60;i++){var padded=i<10?'0'+i:i;var time=selected.clone().second(i);var disabled=!1;if(minDate&&time.isBefore(minDate))
disabled=!0;if(maxDate&&time.isAfter(maxDate))
disabled=!0;if(selected.second()==i&&!disabled){html+='<option value="'+i+'" selected="selected">'+padded+'</option>'}else if(disabled){html+='<option value="'+i+'" disabled="disabled" class="disabled">'+padded+'</option>'}else{html+='<option value="'+i+'">'+padded+'</option>'}}
html+='</select> '}
if(!this.timePicker24Hour){html+='<select class="ampmselect">';var am_html='';var pm_html='';if(minDate&&selected.clone().hour(12).minute(0).second(0).isBefore(minDate))
am_html=' disabled="disabled" class="disabled"';if(maxDate&&selected.clone().hour(0).minute(0).second(0).isAfter(maxDate))
pm_html=' disabled="disabled" class="disabled"';if(selected.hour()>=12){html+='<option value="AM"'+am_html+'>AM</option><option value="PM" selected="selected"'+pm_html+'>PM</option>'}else{html+='<option value="AM" selected="selected"'+am_html+'>AM</option><option value="PM"'+pm_html+'>PM</option>'}
html+='</select>'}
this.container.find('.drp-calendar.'+side+' .calendar-time').html(html)},updateFormInputs:function(){if(this.singleDatePicker||(this.endDate&&(this.startDate.isBefore(this.endDate)||this.startDate.isSame(this.endDate)))){this.container.find('button.applyBtn').prop('disabled',!1)}else{this.container.find('button.applyBtn').prop('disabled',!0)}},move:function(){var parentOffset={top:0,left:0},containerTop,drops=this.drops;var parentRightEdge=$(window).width();if(!this.parentEl.is('body')){parentOffset={top:this.parentEl.offset().top-this.parentEl.scrollTop(),left:this.parentEl.offset().left-this.parentEl.scrollLeft()};parentRightEdge=this.parentEl[0].clientWidth+this.parentEl.offset().left}
switch(drops){case 'auto':containerTop=this.element.offset().top+this.element.outerHeight()-parentOffset.top;if(containerTop+this.container.outerHeight()>=this.parentEl[0].scrollHeight){containerTop=this.element.offset().top-this.container.outerHeight()-parentOffset.top;drops='up'}
break;case 'up':containerTop=this.element.offset().top-this.container.outerHeight()-parentOffset.top;break;default:containerTop=this.element.offset().top+this.element.outerHeight()-parentOffset.top;break}
this.container.css({top:0,left:0,right:'auto'});var containerWidth=this.container.outerWidth();this.container.toggleClass('drop-up',drops=='up');if(this.opens=='left'){var containerRight=parentRightEdge-this.element.offset().left-this.element.outerWidth();if(containerWidth+containerRight>$(window).width()){this.container.css({top:containerTop,right:'auto',left:9})}else{this.container.css({top:containerTop,right:containerRight,left:'auto'})}}else if(this.opens=='center'){var containerLeft=this.element.offset().left-parentOffset.left+this.element.outerWidth()/2-containerWidth/2;if(containerLeft<0){this.container.css({top:containerTop,right:'auto',left:9})}else if(containerLeft+containerWidth>$(window).width()){this.container.css({top:containerTop,left:'auto',right:0})}else{this.container.css({top:containerTop,left:containerLeft,right:'auto'})}}else{var containerLeft=this.element.offset().left-parentOffset.left;if(containerLeft+containerWidth>$(window).width()){this.container.css({top:containerTop,left:'auto',right:0})}else{this.container.css({top:containerTop,left:containerLeft,right:'auto'})}}},show:function(e){if(this.isShowing)return;this._outsideClickProxy=$.proxy(function(e){this.outsideClick(e)},this);$(document).on('mousedown.daterangepicker',this._outsideClickProxy).on('touchend.daterangepicker',this._outsideClickProxy).on('click.daterangepicker','[data-toggle=dropdown]',this._outsideClickProxy).on('focusin.daterangepicker',this._outsideClickProxy);$(window).on('resize.daterangepicker',$.proxy(function(e){this.move(e)},this));this.oldStartDate=this.startDate.clone();this.oldEndDate=this.endDate.clone();this.previousRightTime=this.endDate.clone();this.updateView();this.container.show();this.move();this.element.trigger('show.daterangepicker',this);this.isShowing=!0},hide:function(e){if(!this.isShowing)return;if(!this.endDate){this.startDate=this.oldStartDate.clone();this.endDate=this.oldEndDate.clone()}
if(!this.startDate.isSame(this.oldStartDate)||!this.endDate.isSame(this.oldEndDate))
this.callback(this.startDate.clone(),this.endDate.clone(),this.chosenLabel);this.updateElement();$(document).off('.daterangepicker');$(window).off('.daterangepicker');this.container.hide();this.element.trigger('hide.daterangepicker',this);this.isShowing=!1},toggle:function(e){if(this.isShowing){this.hide()}else{this.show()}},outsideClick:function(e){var target=$(e.target);if(e.type=="focusin"||target.closest(this.element).length||target.closest(this.container).length||target.closest('.calendar-table').length)return;this.hide();this.element.trigger('outsideClick.daterangepicker',this)},showCalendars:function(){this.container.addClass('show-calendar');this.move();this.element.trigger('showCalendar.daterangepicker',this)},hideCalendars:function(){this.container.removeClass('show-calendar');this.element.trigger('hideCalendar.daterangepicker',this)},clickRange:function(e){var label=e.target.getAttribute('data-range-key');this.chosenLabel=label;if(label==this.locale.customRangeLabel){this.showCalendars()}else{var dates=this.ranges[label];this.startDate=dates[0];this.endDate=dates[1];if(!this.timePicker){this.startDate.startOf('day');this.endDate.endOf('day')}
if(!this.alwaysShowCalendars)
this.hideCalendars();this.clickApply()}},clickPrev:function(e){var cal=$(e.target).parents('.drp-calendar');if(cal.hasClass('left')){this.leftCalendar.month.subtract(1,'month');if(this.linkedCalendars)
this.rightCalendar.month.subtract(1,'month');}else{this.rightCalendar.month.subtract(1,'month')}
this.updateCalendars()},clickNext:function(e){var cal=$(e.target).parents('.drp-calendar');if(cal.hasClass('left')){this.leftCalendar.month.add(1,'month')}else{this.rightCalendar.month.add(1,'month');if(this.linkedCalendars)
this.leftCalendar.month.add(1,'month');}
this.updateCalendars()},hoverDate:function(e){if(!$(e.target).hasClass('available'))return;var title=$(e.target).attr('data-title');var row=title.substr(1,1);var col=title.substr(3,1);var cal=$(e.target).parents('.drp-calendar');var date=cal.hasClass('left')?this.leftCalendar.calendar[row][col]:this.rightCalendar.calendar[row][col];var leftCalendar=this.leftCalendar;var rightCalendar=this.rightCalendar;var startDate=this.startDate;if(!this.endDate){this.container.find('.drp-calendar tbody td').each(function(index,el){if($(el).hasClass('week'))return;var title=$(el).attr('data-title');var row=title.substr(1,1);var col=title.substr(3,1);var cal=$(el).parents('.drp-calendar');var dt=cal.hasClass('left')?leftCalendar.calendar[row][col]:rightCalendar.calendar[row][col];if((dt.isAfter(startDate)&&dt.isBefore(date))||dt.isSame(date,'day')){$(el).addClass('in-range')}else{$(el).removeClass('in-range')}})}},clickDate:function(e){if(!$(e.target).hasClass('available'))return;var title=$(e.target).attr('data-title');var row=title.substr(1,1);var col=title.substr(3,1);var cal=$(e.target).parents('.drp-calendar');var date=cal.hasClass('left')?this.leftCalendar.calendar[row][col]:this.rightCalendar.calendar[row][col];if(this.endDate||date.isBefore(this.startDate,'day')){if(this.timePicker){var hour=parseInt(this.container.find('.left .hourselect').val(),10);if(!this.timePicker24Hour){var ampm=this.container.find('.left .ampmselect').val();if(ampm==='PM'&&hour<12)
hour+=12;if(ampm==='AM'&&hour===12)
hour=0}
var minute=parseInt(this.container.find('.left .minuteselect').val(),10);if(isNaN(minute)){minute=parseInt(this.container.find('.left .minuteselect option:last').val(),10)}
var second=this.timePickerSeconds?parseInt(this.container.find('.left .secondselect').val(),10):0;date=date.clone().hour(hour).minute(minute).second(second)}
this.endDate=null;this.setStartDate(date.clone())}else if(!this.endDate&&date.isBefore(this.startDate)){this.setEndDate(this.startDate.clone())}else{if(this.timePicker){var hour=parseInt(this.container.find('.right .hourselect').val(),10);if(!this.timePicker24Hour){var ampm=this.container.find('.right .ampmselect').val();if(ampm==='PM'&&hour<12)
hour+=12;if(ampm==='AM'&&hour===12)
hour=0}
var minute=parseInt(this.container.find('.right .minuteselect').val(),10);if(isNaN(minute)){minute=parseInt(this.container.find('.right .minuteselect option:last').val(),10)}
var second=this.timePickerSeconds?parseInt(this.container.find('.right .secondselect').val(),10):0;date=date.clone().hour(hour).minute(minute).second(second)}
this.setEndDate(date.clone());if(this.autoApply){this.calculateChosenLabel();this.clickApply()}}
if(this.singleDatePicker){this.setEndDate(this.startDate);if(!this.timePicker&&this.autoApply)
this.clickApply();}
this.updateView();e.stopPropagation()},calculateChosenLabel:function(){var customRange=!0;var i=0;for(var range in this.ranges){if(this.timePicker){var format=this.timePickerSeconds?"YYYY-MM-DD HH:mm:ss":"YYYY-MM-DD HH:mm";if(this.startDate.format(format)==this.ranges[range][0].format(format)&&this.endDate.format(format)==this.ranges[range][1].format(format)){customRange=!1;this.chosenLabel=this.container.find('.ranges li:eq('+i+')').addClass('active').attr('data-range-key');break}}else{if(this.startDate.format('YYYY-MM-DD')==this.ranges[range][0].format('YYYY-MM-DD')&&this.endDate.format('YYYY-MM-DD')==this.ranges[range][1].format('YYYY-MM-DD')){customRange=!1;this.chosenLabel=this.container.find('.ranges li:eq('+i+')').addClass('active').attr('data-range-key');break}}
i++}
if(customRange){if(this.showCustomRangeLabel){this.chosenLabel=this.container.find('.ranges li:last').addClass('active').attr('data-range-key')}else{this.chosenLabel=null}
this.showCalendars()}},clickApply:function(e){this.hide();this.element.trigger('apply.daterangepicker',this)},clickCancel:function(e){this.startDate=this.oldStartDate;this.endDate=this.oldEndDate;this.hide();this.element.trigger('cancel.daterangepicker',this)},monthOrYearChanged:function(e){var isLeft=$(e.target).closest('.drp-calendar').hasClass('left'),leftOrRight=isLeft?'left':'right',cal=this.container.find('.drp-calendar.'+leftOrRight);var month=parseInt(cal.find('.monthselect').val(),10);var year=cal.find('.yearselect').val();if(!isLeft){if(year<this.startDate.year()||(year==this.startDate.year()&&month<this.startDate.month())){month=this.startDate.month();year=this.startDate.year()}}
if(this.minDate){if(year<this.minDate.year()||(year==this.minDate.year()&&month<this.minDate.month())){month=this.minDate.month();year=this.minDate.year()}}
if(this.maxDate){if(year>this.maxDate.year()||(year==this.maxDate.year()&&month>this.maxDate.month())){month=this.maxDate.month();year=this.maxDate.year()}}
if(isLeft){this.leftCalendar.month.month(month).year(year);if(this.linkedCalendars)
this.rightCalendar.month=this.leftCalendar.month.clone().add(1,'month');}else{this.rightCalendar.month.month(month).year(year);if(this.linkedCalendars)
this.leftCalendar.month=this.rightCalendar.month.clone().subtract(1,'month');}
this.updateCalendars()},timeChanged:function(e){var cal=$(e.target).closest('.drp-calendar'),isLeft=cal.hasClass('left');var hour=parseInt(cal.find('.hourselect').val(),10);var minute=parseInt(cal.find('.minuteselect').val(),10);if(isNaN(minute)){minute=parseInt(cal.find('.minuteselect option:last').val(),10)}
var second=this.timePickerSeconds?parseInt(cal.find('.secondselect').val(),10):0;if(!this.timePicker24Hour){var ampm=cal.find('.ampmselect').val();if(ampm==='PM'&&hour<12)
hour+=12;if(ampm==='AM'&&hour===12)
hour=0}
if(isLeft){var start=this.startDate.clone();start.hour(hour);start.minute(minute);start.second(second);this.setStartDate(start);if(this.singleDatePicker){this.endDate=this.startDate.clone()}else if(this.endDate&&this.endDate.format('YYYY-MM-DD')==start.format('YYYY-MM-DD')&&this.endDate.isBefore(start)){this.setEndDate(start.clone())}}else if(this.endDate){var end=this.endDate.clone();end.hour(hour);end.minute(minute);end.second(second);this.setEndDate(end)}
this.updateCalendars();this.updateFormInputs();this.renderTimePicker('left');this.renderTimePicker('right')},elementChanged:function(){if(!this.element.is('input'))return;if(!this.element.val().length)return;var dateString=this.element.val().split(this.locale.separator),start=null,end=null;if(dateString.length===2){start=moment(dateString[0],this.locale.format);end=moment(dateString[1],this.locale.format)}
if(this.singleDatePicker||start===null||end===null){start=moment(this.element.val(),this.locale.format);end=start}
if(!start.isValid()||!end.isValid())return;this.setStartDate(start);this.setEndDate(end);this.updateView()},keydown:function(e){if((e.keyCode===9)||(e.keyCode===13)){this.hide()}
if(e.keyCode===27){e.preventDefault();e.stopPropagation();this.hide()}},updateElement:function(){if(this.element.is('input')&&this.autoUpdateInput){var newValue=this.startDate.format(this.locale.format);if(!this.singleDatePicker){newValue+=this.locale.separator+this.endDate.format(this.locale.format)}
if(newValue!==this.element.val()){this.element.val(newValue).trigger('change')}}},remove:function(){this.container.remove();this.element.off('.daterangepicker');this.element.removeData()}};$.fn.daterangepicker=function(options,callback){var implementOptions=$.extend(!0,{},$.fn.daterangepicker.defaultOptions,options);this.each(function(){var el=$(this);if(el.data('daterangepicker'))
el.data('daterangepicker').remove();el.data('daterangepicker',new DateRangePicker(el,implementOptions,callback))});return this};return DateRangePicker}))