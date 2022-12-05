<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <title>Форма регистрации</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: rgb(255, 254, 254);
        font-family: "Roboto Mono", monospace;
      }
      h1 {
        font-weight: 700;
      }
      form {
        transform: translateY(0px);
        filter: drop-shadow(1px 2px 4px hsl(0deg, 0%, 0%, 0.2));
      }
      form:focus-within {
        transform: translateY(-4px);
        filter: drop-shadow(1px 2px 4px hsl(0deg, 20%, 0%, 0.4));
      }

      .material-symbols-outlined {
        font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 48;
      }
      .key {
        cursor: pointer;
      }
      .key:hover {
        color: red;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center">Авторизация пользователя</h1>
      <div class="col-md-5 mx-auto mt-4">
        <form onsubmit="sendForm(this); return false;">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="material-symbols-outlined"> mail </span>
              </div>
            </div>
            <input
              type="email"
              class="form-control"
              placeholder="E-mail"
              name="email"
            />
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="material-symbols-outlined"> key </span>
              </div>
            </div>
            <input
              type="password"
              class="form-control"
              placeholder="Пароль"
              required
              id="formPass"
              name="pass"
            />
            <span
              onmousedown="formPass.type='text'; this.nextElementSibling.hidden=false; this.hidden=true;"
              class="material-symbols-outlined key"
              >&nbsp; visibility
            </span>
            <span
              class="material-symbols-outlined key"
              hidden
              onmouseup="formPass.type='password';  this.previousElementSibling.hidden=false; this.hidden=true;"
              >&nbsp;&nbsp;visibility_off
            </span>
          </div>
          <p id="info"></p>
          <input
            type="submit"
            class="btn btn-lg btn-primary form-control"
            value="Войти"
          />
        </form>
      </div>
    </div>

<script>
	async function sendForm(form) {
		info.innerText = "";
		let formData = new FormData(form);

		let response = await fetch("/authUser", {
			method: "POST",
			body: formData,
		});
		let res = await response.json();

		if (res.result == "success") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "/users/profile";
			}, 3000);
		} else if (res.result == "exist") {
			info.innerText = "Такого пользователя не существует!";
		} else {
			alert("Неизвестная ошибка...");
		}
	}
</script>

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
