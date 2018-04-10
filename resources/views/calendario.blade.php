<!doctype html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Mini calendar with the recurring events</title>

    <link rel="stylesheet" href="{{asset('vendor/dhtmlxScheduler/codebase/dhtmlxscheduler_flat.css')}}" type="text/css"  title="no title"
    charset="utf-8">
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/dhtmlxscheduler.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_recurring.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_minical.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_agenda_view.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_year_view.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('vendor/dhtmlxScheduler/codebase/locale/locale_es.js')}}" type="text/javascript" charset="utf-8"></script>


    <style type="text/css" >
    html, body {
        margin: 0px;
        padding: 0px;
        height: 100%;
        overflow: hidden;
    }
</style>
<script type="text/javascript" charset="utf-8">



    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    function init() {

        scheduler.config.multi_day = true;
        scheduler.config.event_duration =  getRandomInt(1, 59);
        scheduler.config.xml_date = "%Y-%m-%d %H:%i";
        scheduler.config.occurrence_timestamp_in_utc = true;
        scheduler.config.include_end_by = true;
        scheduler.config.repeat_precise = true;
        scheduler.locale.labels.agenda_tab="Agenda";
        scheduler.locale.labels.year_tab ="Año";

        scheduler.attachEvent("onLightbox", function(){
            var lightbox_form = scheduler.getLightbox(); // this will generate lightbox form
            var inputs = lightbox_form.getElementsByTagName('input');
            var date_of_end = null;
            for (var i=0; i<inputs.length; i++) {
                if (inputs[i].name == "date_of_end") {
                    date_of_end = inputs[i];
                    break;
                }
            }

            var repeat_end_date_format = scheduler.date.date_to_str(scheduler.config.repeat_date);
            var show_minical = function(){
                if (scheduler.isCalendarVisible())
                    scheduler.destroyCalendar();
                else {
                    scheduler.renderCalendar({
                        position:date_of_end,
                        date: scheduler.getState().date,
                        navigation:true,
                        handler:function(date,calendar) {
                            date_of_end.value = repeat_end_date_format(date);
                            scheduler.destroyCalendar()
                        }
                    });
                }
            };
            date_of_end.onclick = show_minical;
        });

        scheduler.config.lightbox.sections = [
        { name:"description", height:200, map_to:"text", type:"textarea" , focus:true },
        { name:"recurring", type:"recurring", map_to:"rec_type", button:"recurring" },
        { name:"time", height:72, type:"calendar_time", map_to:"auto" }
        ];

        scheduler.init('scheduler_here', new Date(2018, 0, 10), "week");

        scheduler.parse(obj,"json");

    }
</script>
</head>
<body onload="init()">
    <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_tab" name="agenda_tab" style="right:280px;"></div>
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
            <div class="dhx_cal_tab" name="year_tab" style="right:280px;"></div>
        </div>
        <div class="dhx_cal_header">
        </div>
        <div class="dhx_cal_data">
        </div>
    </div>
</div>
</body>