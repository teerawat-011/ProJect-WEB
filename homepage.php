<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  <link rel="stylesheet" href="styles011.css" />
  </head>
  <body>
    <header>
      <nav>
        <a href="">Home</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Log out</a>
      </nav>
    </header>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

    <!-- carousel -->
    <div class="carousel">
      <!-- list item -->
      <div class="list">
        <div class="item">
          <img src="image/deadpool.jpg" />
          <div class="content">
            <div class="author">TEERAWAT011</div>
            <div class="title">DEAD POOL</div>
            <div class="topic">2016</div>
            <div class="des">
             <h3>Wade Wilson อดีตทหารรับจ้างที่ป่วยเป็นมะเร็งยอมเข้ารับการทดลองลับจนได้พลังฟื้นฟูร่างกาย 
             แต่รูปลักษณ์ภายนอกกลับกลายเป็นปีศาจ เขาใช้ชื่อใหม่ว่า “Deadpool” และออกตามล่า Ajax 
             ผู้ที่ทำลายชีวิตเขา หนังเต็มไปด้วยอารมณ์ขัน กวน ๆ และฉากต่อสู้สุดมันในแบบซูเปอร์ฮีโร่แหวกแนวของ Marvel</h3>
            </div>
            <div class="buttons">
              <a href=https://www.imdb.com/title/tt1431045?ref_=ext_shr_lnk>
              <button>SEE MORE</button> 
            </a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/dune2.jpg" />
          <div class="content">
            <div class="author">TEERAWAT011</div>
            <div class="title">DUNE</div>
            <div class="topic">PART 2</div>
            <div class="des">
              <h3>หลังจากตระกูล Atreides ถูกทรยศ Paul Atreides หลบหนีไปยังทะเลทรายของดาว Arrakis 
                และเข้าร่วมกับชนเผ่า Fremen เขาฝึกฝนตนเองและเริ่มกลายเป็นผู้นำในตำนาน “Muad'Dib” เพื่อแก้แค้นศัตรูและทวงคืนความยุติธรรม 
                เขาต้องต่อสู้กับ House Harkonnen และจักรพรรดิ พร้อมใช้พลังจิตและศรัทธาของผู้คนเพื่อลุกขึ้นเป็นผู้นำจักรวาลใหม่</h3>
            </div>
            <div class="buttons">
              <a href="https://www.imdb.com/title/tt15239678/?utm_source=chatgpt.com&ref_=ext_shr_lnk">
              <button>SEE MORE</button>
              </a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/joker.jpg" />
          <div class="content">
            <div class="author">TEERAWAT011</div>
            <div class="title">JOKER</div>
            <div class="topic">2019</div>
            <div class="des">
           <h3>Arthur Fleck ชายผู้มีปัญหาทางจิตในเมือง Gotham ที่เต็มไปด้วยความเหลื่อมล้ำ 
           เขาทำงานเป็นตัวตลกและใฝ่ฝันอยากเป็นนักแสดงตลก แต่ถูกสังคมเหยียดหยามและทำร้าย 
           จนเขาเริ่มสูญเสียความเป็นตัวเอง หลังจากถูกกลั่นแกล้ง เขาก่อเหตุฆ่าคนในรถไฟใต้ดิน จุดชนวนให้เกิดการลุกฮือของประชาชนในหน้ากากตลก 
           สุดท้าย Arthur แปลงร่างเป็น “Joker” อย่างสมบูรณ์ และกลายเป็นสัญลักษณ์ของความบ้าคลั่งในเมือง</h3>
            </div>
            <div class="buttons">
              <a href="https://www.imdb.com/title/tt7286456/?utm_source=chatgpt.com&ref_=ext_shr_lnk">
              <button>SEE MORE</button>
              </a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/Spiderman.jpg" />
          <div class="content">
            <div class="author">TEERAWAT011</div>
            <div class="title">The Amazing </div> 
            <div class="topic">Spider-Man</div> 
            <div class="des">
              <h3>ภาพยนตร์รีบูตเรื่องราวของปีเตอร์ พาร์คเกอร์ เด็กหนุ่มมัธยมที่ถูกแมงมุมกลายพันธุ์กัด
จนได้รับพลังเหนือมนุษย์ และต้องใช้พลังนั้นเพื่อปกป้องผู้คนจากวายร้าย “The Lizard”
ในขณะเดียวกันก็ต้องค้นหาความจริงเกี่ยวกับการหายตัวไปของพ่อแม่เขา</h3>
            </div>
            <div class="buttons">
              <a href="https://www.imdb.com/title/tt0948470/?utm_source=chatgpt.com&ref_=ext_shr_lnk">
              <button>SEE MORE</button>
             </a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="image/Mr.Robot.jpg" />
          <div class="content">
            <div class="author">TEERAWAT011</div>
            <div class="title">MR</div>
            <div class="topic">Robot</div>
            <div class="des">
              <h3>ซีรีส์ Mr. Robot ผลงานแนว Techno-Thriller / Psychological Drama จากผู้สร้าง Sam Esmail ออกอากาศในปี 2015-2019 รวมทั้งหมด 4 ฤดูกาล
เรื่องราวเล่าถึง Elliot Alderson (รับบทโดย Rami Malek) วิศวกรด้านความปลอดภัยทางไซเบอร์ผู้มีปัญหาทางจิต เขาใช้ชีวิตสองด้าน — กลางวันเป็นพนักงานไอที แต่กลางคืนกลายเป็นแฮกเกอร์ที่ถูกดึงเข้าสู่กลุ่มใต้ดินชื่อ fsociety ที่มีเป้าหมายโค่นล้มระบบทุนนิยมโลก
ซีรีส์นี้ได้รับคำชื่นชมอย่างล้นหลามทั้งด้านการแสดงของ Rami Malek งานภาพสไตล์ “glitch” ที่สื่อถึงความบิดเบี้ยวของจิตใจ และบทที่ซับซ้อนสะท้อนประเด็นสังคมร่วมสมัยได้อย่างเฉียบคม</h3>
            </div>
            <div class="buttons">
              <a href="https://www.imdb.com/title/tt4158110/?utm_source=chatgpt.com&ref_=ext_shr_lnk">
              <button>SEE MORE</button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- list thumnail -->
      <div class="thumbnail">
        <div class="item">
          <img src="image/deadpoolmiddle.jpg" />
          <div class="content">
            <div class="title">DeadPool</div>
           
          </div>
        </div>
        <div class="item">
          <img src="image/dunemid.jpg" />
          <div class="content">
            <div class="title">Dune</div>
           
          </div>
        </div>
        <div class="item">
          <img src="image/jokerCopy.jpg" />
          <div class="content">
            <div class="title">Joker</div>
            
          </div>
        </div>
        <div class="item">
          <img src="image/Spiderman.jpg" />
          <div class="content">
            <div class="title">Spider Man</div>
            
          </div>
        </div>
        <div class="item">
          <img src="image/Mr.Robot mid.jpg" />
          <div class="content">
            <div class="title">Mr.Robot</div>
          </div>
        </div>
      </div>
      <!-- next prev -->

      <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
      </div>
      <!-- time running -->
    </div> <!-- end .carousel -->

    <script src="app.js"></script>
  </body>
</html>
