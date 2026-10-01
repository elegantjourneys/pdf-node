<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?php echo h(ucwords($tourData['name'])); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #eef0f4;
    }

    /* ── Sticky toolbar ── */
    #copy-toolbar {
      position: sticky;
      top: 0;
      z-index: 999;
      background: #003366;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 24px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .35);
    }

    #copy-toolbar span {
      font-size: 14px;
      opacity: .85;
    }

    #copy-toolbar .toolbar-actions {
      display: flex;
      gap: 10px;
    }

    #copy-toolbar button {
      padding: 8px 20px;
      border: none;
      border-radius: 4px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: opacity .15s;
    }

    #copy-toolbar button:hover {
      opacity: .85;
    }

    #btn-save-pdf {
      background: #b8860b;
      color: #fff;
    }

    #btn-preview {
      background: #fff;
      color: #003366;
    }

    #btn-reset {
      background: transparent;
      color: #ffd;
      border: 1px solid #ffd;
    }


    /* ── Saving overlay ── */
    #saving-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0, 51, 102, .75);
      z-index: 9999;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 14px;
      color: #fff;
      font-size: 18px;
    }

    #saving-overlay.active {
      display: flex;
    }

    .spinner {
      width: 48px;
      height: 48px;
      border: 5px solid rgba(255, 255, 255, .3);
      border-top-color: #b8860b;
      border-radius: 50%;
      animation: spin .8s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @media print {

      #copy-toolbar,
      #saving-overlay {
        display: none !important;
      }

      #page-container {
        box-shadow: none;
        margin: 0;
      }

      .editable {
        background: transparent !important;
        outline: none !important;
      }
    }
  </style>
  <?php
  echo $this->Html->script('ckeditor/ckeditor');
  echo $this->Html->script('ckfinder/ckfinder');
  ?>
</head>

<body>

  
  <div id="copy-toolbar">
    <span>✎ &nbsp;Editing copy of: <strong><?php echo h(ucwords($tourData['name'])); ?></strong></span>
    <div class="toolbar-actions">

      <button id="btn-save-pdf" type="button">⬇ Save as PDF</button>
    </div>
  </div>

 
  <div id="saving-overlay">
    <div class="spinner"></div>
    <span>Generating your PDF...</span>
  </div>

  
  <form id="pdf-form" method="POST" action="<?php echo h($saveUrl); ?>" style="display:none;">
    <?php echo $this->Form->hidden('_csrfToken', ['value' => $this->request->getAttribute('csrfToken')]); ?>
    <input type="hidden" name="view_type" value="<?php echo h($tourData['view_type']); ?>" />
  </form>

<?php
  $fullHtmlTemplate = $this->element('pdf/pdf_template_7', ['tourData' => $tourData]);
?>

<textarea id="editor"><?= h($fullHtmlTemplate) ?></textarea>

  <script>
    CKEDITOR.replace('editor', {
    fullPage: true,
    height: 800,
    allowedContent: true,
    extraAllowedContent: '*[*]{*}(*)'
});

    document.getElementById('btn-save-pdf').addEventListener('click', function () {

        // Update editor data
        CKEDITOR.instances.editor.updateElement();

        // Get HTML
        let htmlContent = CKEDITOR.instances.editor.getData();

        // Create form data
        let formData = new FormData();
        formData.append('_csrfToken', '<?php \Cake\Log\Log::error(print_r($tourData, true)); echo $this->request->getAttribute("csrfToken"); ?>');
        formData.append('html_content', htmlContent);

        // Show loader
        document.getElementById('saving-overlay').classList.add('active');

        fetch('<?php \Cake\Log\Log::error(print_r($tourData, true)); echo $saveUrl; ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.blob())
        .then(blob => {

            // Hide loader
            document.getElementById('saving-overlay').classList.remove('active');

            // Create download link
            const url = window.URL.createObjectURL(blob);

            const a = document.createElement('a');
            a.href = url;
            a.download = 'tour-pdf.pdf';

            document.body.appendChild(a);
            a.click();

            a.remove();

            window.URL.revokeObjectURL(url);
        })
        .catch(error => {

            document.getElementById('saving-overlay').classList.remove('active');

            console.error(error);

            alert('PDF download failed');
        });
    });
</script>

</body>

</html>
