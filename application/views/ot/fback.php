<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view("util/commoncss.php"); ?>
    </head>
<body>

<?php $this->load->view("util/navbar.php"); ?>
    <div class="container">
        <h1>
            Feedback
        </h1>
        <hr>
        <form role="form" id="addFBForm" method="post" action="ot/addFB">
          <div class="form-group">
              <label for="sessionId">Choose class session *: </label>
              <select id='sessionId' name="sessionId" required>
                  <?php
                  foreach($sessions as $row) {
                      print("<option value=" . $row->session_id . ">" . $row->session_name . " - " . $row->session_speaker . "</option>");
                  }
                  ?>
              </select>
          </div>
          <div class="form-group">
            <label>A. Duration of the training programme:</label>
            <div class="container">
                <div class="radio">
                  <label>
                    <input type="radio" name="duration" id="durRadios1" value="SF" checked>
                    Sufficient
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="duration" id="durRadios2" value="LN">
                    Could be longer
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="duration" id="durRadios3" value="ST">
                    Could be shorter
                  </label>
                </div>
            </div>
          </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="form-group">
              <label>B. Evaluation of the training programme:</label>
              <div class="container">
                  <div>
                      <label class="radio">1. Content:</label>
                      <label class="radio-inline">
                        <input type="radio" name="content" id="contentRadio1" value="E">
                        Excellent
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="content" id="contentRadio2" value="V" checked>
                        Very Good
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="content" id="contentRadio3" value="G">
                        Good
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="content" id="contentRadio4" value="A">
                        Average
                      </label>
                  </div>
                 <div>
                     <label class="radio">2. Presentation:</label>
                     <label class="radio-inline">
                         <input type="radio" name="pres" id="presRadio1" value="E">
                         Excellent
                     </label>
                     <label class="radio-inline">
                         <input type="radio" name="pres" id="presRadio2" value="V" checked>
                         Very Good
                     </label>
                     <label class="radio-inline">
                         <input type="radio" name="pres" id="presRadio3" value="G">
                         Good
                     </label>
                     <label class="radio-inline">
                         <input type="radio" name="pres" id="presRadio4" value="A">
                         Average
                     </label>
                 </div>

               <div>
                   <label class="radio">3. Relevance:</label>
                   <label class="radio-inline">
                       <input type="radio" name="relevance" id="relRadio1" value="E">
                       Excellent
                   </label>
                   <label class="radio-inline">
                       <input type="radio" name="relevance" id="relRadio2" value="V" checked>
                       Very Good
                   </label>
                   <label class="radio-inline">
                       <input type="radio" name="relevance" id="relRadio3" value="G">
                       Good
                   </label>
                   <label class="radio-inline">
                       <input type="radio" name="relevance" id="relRadio4" value="A">
                       Average
                   </label>
               </div>
              </div>

          </div>
          <div class="form-group">
                        <label>C. Overall assessment and usefulness:</label>
                        <div class="container">
                            <div>
                                <label class="radio">1. Class Sessions:</label>
                                <label class="radio-inline">
                                  <input type="radio" name="class" id="classRadio1" value="E">
                                  Excellent
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="class" id="classRadio2" value="V" checked>
                                  Very Good
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="class" id="classRadio3" value="G">
                                  Good
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="class" id="classRadio4" value="A">
                                  Average
                                </label>
                            </div>
                           <div>
                               <label class="radio">2. Reading materials:</label>
                               <label class="radio-inline">
                                   <input type="radio" name="reading" id="readingRadio1" value="E">
                                   Excellent
                               </label>
                               <label class="radio-inline">
                                   <input type="radio" name="reading" id="readingRadio2" value="V" checked>
                                   Very Good
                               </label>
                               <label class="radio-inline">
                                   <input type="radio" name="reading" id="readingRadio3" value="G">
                                   Good
                               </label>
                               <label class="radio-inline">
                                   <input type="radio" name="reading" id="readingRadio4" value="A">
                                   Average
                               </label>
                            </div>
                            <div>
                                <label class="radio">3. Interactive sessions:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="interactive" id="interactiveRadio1" value="E">
                                    Excellent
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="interactive" id="interactiveRadio2" value="V" checked>
                                    Very Good
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="interactive" id="interactiveRadio3" value="G">
                                    Good
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="interactive" id="interactiveRadio4" value="A">
                                    Average
                                </label>
                            </div>
                            <div>
                                <label class="radio">4. Visual Aids:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="visual" id="visualRadio1" value="E">
                                    Excellent
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visual" id="visualRadio2" value="V" checked>
                                    Very Good
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visual" id="visualRadio3" value="G">
                                    Good
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visual" id="visualRadio4" value="A">
                                    Average
                                </label>
                            </div>
                        </div>

                    </div>
          <div class="form-group">
            <label>D. Comments and Suggestions:</label>
            <textarea id="comments" name="comments" class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <?php $this->load->view("util/commonscripts.php"); ?>
    <?php $this->load->view("util/footer");?>

</body>
</html>