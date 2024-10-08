<footer>
        <div class="footer1">
                <div class="footer1_con">
                    <div class="a"><a href="#">FIND A STORE</a><br></div>
                    <div class="a"><a href="#">BECOME A MEMBER</a><br></div>
                    <div class="a"><a href="#">Send Us Feedback</a><br></div>
                </div>
                <div class="footer1_con">
                    <div class="a"><a href="#">GET HELP</a><br></div>
                    <div class="aa"><a href="#">Delivery</a><br></div>
                    <div class="aa"><a href="#">Order Status</a><br></div>
                    <div class="aa"><a href="#">Returns</a><br></div>
                    <div class="aa"><a href="#">Payment Options</a><br></div>
                    <div class="aa"><a href="#">Contact Us</a><br></div>
                </div>
                <div class="footer1_con">
                    <div class="a"><a href="#">ABOUT Laptop</a><br></div>
                    <div class="aa"><a href="#">News</a><br></div>
                    <div class="aa"><a href="#">Careers</a><br></div>
                    <div class="aa"><a href="#">Investors</a><br></div>
                    <div class="aa"><a href="#">Sustainability</a><br></div>
                </div>
                <div class="rong" style="width: 20px;">
                </div>
                <div class="mxh">
                    <a href="https://www.facebook.com/chuquang.tung.54/" class="icon" id="aaa">
                        <i class='bx bxl-facebook-circle'></i></a>
                    <a href="https://www.instagram.com/qgtung_04//" class="icon" id="aaa">
                        <i class='bx bxl-instagram'></i></a>
                    <a href="https://www.youtube.com/channel/UCk2faVYog4YyfzNgRrqJHgA" class="icon" id="aaa">
                        <i class='bx bxl-youtube'></i></a>
                    <a href="https://www.tiktok.com/@quangtung_04" class="icon" id="aaa">
                        <i class='bx bxl-tiktok' ></i></a>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var images = ["view/images/2.jpg","view/images/3.jpg","view/images/4.jpg","view/images/1.jpg"];
        var num = 0;
        function next(){
            var silder = document.getElementById("slider");
            num++;
            if(num >= images.length){
                num = 0;
            }
            silder.src = images[num];
        }
        function back(){
            var silder = document.getElementById("slider");
            num--;
            if(num < 0){
                num = images.length-1;
            }
            slider.src = images[num];
        }
        setInterval(next,4000);
    </script>
</body>
</html>