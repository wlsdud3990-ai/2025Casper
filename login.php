<!-- 상단 헤더 연결 -->
<?php
 include('./sub/header.php');
?>

<main>
  <form class="login-form" name="로그인" method="post" action="./php/login_check.php">
    <fieldset>
      <legend>로그인</legend>

      <!-- 아이디 입력 -->
      <p>
        <label for="id_txt"></label>
        <input type="text" placeholder="아이디를 입력해주세요." id="id_txt" name="id_txt">
      </p>

      <!-- 비밀번호 입력 -->
      <p>
        <label for="pw_txt"></label>
        <input type="password" placeholder="비밀번호를 입력해주세요." id="pw_txt" name="pw_txt">
      </p>

      <!-- 아이디 저장 체크박스 -->
      <p class="checkbox">
        <label>
          <input type="checkbox" id="id_save" name="id_save">
          아이디 저장
        </label>
      </p>

      <!-- 로그인 버튼 -->
      <p>
        <input type="submit" value="로그인" id="login_btn">
      </p>

      <!-- 링크들 -->
      <p class="links">
        <a href="#" title="아이디 찾기">아이디 찾기</a> |
        <a href="#" title="비밀번호 찾기">비밀번호 찾기</a> |
        <a href="./php/register.php" title="회원가입">회원가입</a>
      </p>

    </fieldset>
  </form>
</main>



<!-- 하단 푸터 연결 -->
<?php
 include('./sub/footer.php');
?>

  <!-- 제이쿼리 라이브러리 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- 제이쿼리 쿠키 파일 -->
  <script src="./script/jquery.cookie.js"></script>
  <script>
    $(document).ready(function(){
        //1.쿠키이름 저장(개발자가 알아서)
        let key = $.cookie('idChk');
        
        //2. 만약에 브라우저에 key변수에 값이 저장되어 있다면(쿠키가 있다면)
        if(key){ 
            $('#id_txt').val(key); //id가 id박스 안에 표시되어야(체크박스에 체크)
            $('#id_save').prop('checked', true); //체크 박스에 체크가 되어 있음. (아이디 값 표시)
          }

          //3. 체크 박스를 체크하지 않고 다시 체크를 풀 경우(쿠키 저장하지 않겠다/삭제)
          $('#id_save').change(function(){
            if($(this).is(':checked')){//is메서드는 체크여부를 true/false로 알려줌
              //쿠키 생성하기
              $.cookie('idChk', $('#id_txt').val(), {expires:7, path:'/'});  
            }else{ //체크를 하지 않은 경우
              //쿠키 생성하지 않음
              $.removeCookie('idChk', {path:'/'});
            }
          });

          //4. 아이디 입력 시 쿠키 생성
          $('#id_txt').keyup(function(){
             if($('#id_save').is(':checked')){//is메서드는 체크여부를 true/false로 알려줌
              //쿠키 생성하기
              $.cookie('idChk', $(this).val(), {expires:7, path:'/'});  
             }
          });

        });

  </script>  