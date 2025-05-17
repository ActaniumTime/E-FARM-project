<?php 
include './partials/header.php';
require_once __DIR__ . '/models/CRUD-oper/farmer.php';
 ?>


<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Додати новину</title>

  <!-- TinyMCE -->
  <script src="https://cdn.tiny.cloud/1/mmim4uplvaewukcxy9lw13pc9ung4hfh72zn2i0uvm7t7xa4/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#editor',
      menubar: true,
      plugins: 'lists link image code',
      toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
      height: 400
    });
  </script>
</head>
<body>

<h2>Додати новину</h2>
<form class="form" id="newsForm" enctype="multipart/form-data">
  <label>Заголовок:<br>
    <input type="text" name="title" required>
  </label><br><br>

  <label>Автор (ID):<br>
    <input type="number" name="author_id" required>
  </label><br><br>

    <label>Підзаголовок:<br>
    <input type="Subtitle" name="Subtitle" required>
  </label><br><br>

  <label>Зображення:<br>
    <input type="file" name="images[]" accept="image/*" multiple>
  </label><br><br>

  <label>Контент:<br>
    <textarea id="editor"></textarea>
  </label><br><br>

  <button type="submit">Додати новину</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('newsForm');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    tinymce.triggerSave();

    const rawHtml = tinymce.get('editor').getContent().trim();

    // Разбиваем контент на массив по верхнеуровневым блокам
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = rawHtml;

    const blocks = Array.from(tempDiv.children).map(el => el.outerHTML.trim());

    if (blocks.length === 0) {
      alert('Контент не може бути порожнім.');
      return;
    }

    // Создаём FormData вручную (без content поля)
    const formData = new FormData(form);
    formData.append('content', JSON.stringify(blocks));

    try {
      const response = await fetch('./models/CRUD-oper/AddNews.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        alert('Новину успішно додано! ID: ' + result.id);
        form.reset();
        tinymce.get('editor').setContent('');
      } else {
        alert('Помилка: ' + result.error);
      }
    } catch (error) {
      console.error('Помилка під час надсилання форми:', error);
      alert('Виникла помилка при надсиланні.');
    }
  });
});
</script>

<?php include './partials/footer.php'; ?>