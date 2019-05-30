<footer class="footer text-center">
      &copy;copyright Loei Rajabhat University | 2018 - 2019
      <p><small style="color:teal;"><span id="theTime"></span></small></p>
     
</footer>
<!-- แสดงวันที่ใน footer -->
<script language="JavaScript" type="text/javascript">
        function sivamtime() {
            now = new Date();
            d = now.getDate();
            m = now.getMonth() + 1;
            y = now.getFullYear() + 543;
            hour = now.getHours();
            min = now.getMinutes();
            sec = now.getSeconds();

            if (min <= 9) {
                min = "0" + min;
            }
            if (sec <= 9) {
                sec = "0" + sec;
            }
            if (hour <= 9) {
                hour = "0" + hour;
            }

            time ="วันที่ " + d + "-" + m + "-" + y + " เวลา  " + hour + ":" + min + ":" + sec;

            if (document.getElementById) {
                theTime.innerHTML = time;
            } else if (document.layers) {
                document.layers.theTime.document.write(time);
                document.layers.theTime.document.close();
            }

            setTimeout("sivamtime()", 1000);
        }
        window.onload = sivamtime;


    </script>
