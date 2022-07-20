$(document).ready(function () {

  //upload first term result
  $("#upl").click(function () {
    var classr = $("#class").val();
    var cls = $("#cls").val();
    var term = $("#term").val();
    var ses = $("#ses").val();

    $(toastr.error("Loading Please wait..."));
    window.location.href =
      "./studres?id=" + classr + "&cls=" + cls + "&term=" + term + "&ses=" + ses;
  });

  //pyschomotor
  $("#pdvupl").click(function () {
    var classr = $("#class").val();
    var cls = $("#cls").val();
    var term = $("#term").val();
    var ses = $("#ses").val();

    $(toastr.error("Loading Please wait..."));
    window.location.href =
      "./resultnext?id=" + classr + "&cls=" + cls + "&term=" + term + "&ses=" + ses;
  });


  //uploading result data
  $("#ressl").click(function () {
    var stsbj = $("#stsbj").val();
    var test = $("#test").val();
    var ass = $("#ass").val();
    var exc = $("#exc").val();
    var exam = $("#exam").val();
    var mid = $("#mid").val();
    var name = $("#name").val();
    var admis = $("#admis").val();
    var cla = $("#cla").val();
    var term = $("#term").val();
    var ses = $("#ses").val();

    if (stsbj == null || stsbj == "") {
      $(toastr.error("Subject can`t be empty"));
    } else {
      if (test == null || test == "") {
        $(toastr.error("Kindly input Continuous Assessment Score"));
      } else {
        if (test > 10) {
          $(toastr.error("Continuous Assessment score can`t be greater than 10"));
        } else {
          if (ass == null || ass == "") {
            $(toastr.error("Kindly input Project score"));
          } else {
            if (ass > 10) {
              $(toastr.error("Project score can`t be greater than 10"));
            } else {
              if (exc == null || exc == "") {
                $(toastr.error("Kindly input Classwork score"));
              } else {
                if (exc > 10) {
                  $(
                    toastr.error(
                      "Classwork score can`t be greater than 10"
                    )
                  );
                } else {
                  if(mid == null || mid == "") {
                    $(toastr.error("Mid-Term score can`t be empty"));
                  } else {

                    if(mid > 10) {
                      $(toastr.error("Mid-Term score can`t be greater than 10"));

                    } else {
                  if (exam == null || exam == "") {
                    $(toastr.error("Exam can`t be empty"));
                  } else {
                    if (exam > 100) {
                      $(toastr.error("Exam score can`t be greater than 90"));
                    } else {
                      $(toastr.error("Loading... Please wait"));
                     $.ajax({
                          type: "post",
                          url: "functions/init.php",
                          data: {
                            stsbj: stsbj,
                            test: test,
                            ass: ass,
                            exc: exc,
                            exam: exam,
                            mid: mid,
                            name: name,
                            admis: admis,
                            cla: cla,
                            term: term,
                            ses: ses,
                          },
                          success: function (data) {
                            $(toastr.error(data)).html(data);
                          },
                        });
                      }
                    }
                  }
                }
              }
              }
            }
          }
        }
      }
    }
  });

  //-------------reset results------------------//
  $("#reseted").click(function () {
    var adm = $("#subb").val();
    var trm = $("#trm").val();
    var ccs = $("#ccs").val();
    var ses = $("#ses").val();

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { adm: adm, trm: trm, ccs: ccs, ses: ses },
      success: function (data) {
        $(toastr.error(data)).html(data);
      },
    });
  });

  //updating result data

  $("#upressl").click(function () {
    var stsbj = $("#stsbj").val();
    var test = $("#test").val();
    var ass = $("#ass").val();
    var exc = $("#exc").val();
    var exam = $("#exam").val();
    var mid = $("#mid").val();
    var name = $("#name").val();
    var admis = $("#admis").val();
    var cla = $("#cla").val();
    var tms = $("#term").val();
    var ses = $("#ses").val();
    var reltdet = $("#reltdet").val();

    if (stsbj == null || stsbj == "") {
      $(toastr.error("Subject can`t be empty"));
    } else {
      if (test == null || test == "") {
        $(toastr.error("Kindly input Continuous Assessment score"));
      } else {
        if (test > 10) {
          $(toastr.error("Continuous Assessment score can`t be greater than 10"));
        } else {
          if (ass == null || ass == "") {
            $(toastr.error("Kindly input Project score"));
          } else {
            if (ass > 10) {
              $(toastr.error("Project score can`t be greater than 10"));
            } else {
              if (exc == null || exc == "") {
                $(toastr.error("Kindly input Classwork score"));
              } else {
                if (exc > 10) {
                  $(
                    toastr.error(
                      "Classwork score can`t be greater than 10"
                    )
                  );
                } else {
                  if (exam == null || exam == "") {
                    $(toastr.error("Exam can`t be empty"));
                  } else {
                    if (exam > 100) {
                      $(toastr.error("Exam score can`t be greater than 90"));
                    } else {
                      if(mid == null || mid == "") {
                        $(toastr.error("Mid-Term score can`t be empty"));
                      } else {
    
                        if(mid > 10) {
                          $(toastr.error("Mid-Term score can`t be greater than 10"));
    
                        } else {
                          $(toastr.error("Loading... Please wait"));
                        $.ajax({
                          type: "post",
                          url: "functions/init.php",
                          data: {
                            stsbj: stsbj,
                            test: test,
                            ass: ass,
                            exc: exc,
                            exam: exam,
                            mid: mid,
                            name: name,
                            admis: admis,
                            cla: cla,
                            tms: tms,
                            ses: ses,
                            reltdet: reltdet,
                          },
                          success: function (data) {
                            $(toastr.error(data)).html(data);
                          },
                        });
                      }
                    }
                  }
                }
              }
              }
            }
          }
        }
      }
    }
  });

  //-------------delete subject results------------------//
  $("#movedel").click(function () {
    var admr = $("#subbr").val();
    var trmr = $("#trmr").val();
    var ccsr = $("#ccsr").val();
    var sbjjr = $("#sbjjr").val();
    var ses = $("#ses").val();

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { admr: admr, trmr: trmr, ccsr: ccsr, sbjjr: sbjjr, ses:ses },
      success: function (data) {
        $(toastr.error(data)).html(data);
      },
    });
  });


  //submit result
  $("#subdone").click(function () {
    var classr = $("#admis").val();
    var cls = $("#cla").val();
    var ncls = $("#cls").val();
    var term = $("#term").val();
    var ses = $("#ses").val();
    var attd = $("#attd").val();
    var punc = $("#punc").val();
    var hons = $("#hons").val();
    var neat = $("#neat").val();
    var nonaggr = $("#nonaggr").val();
    var ldsk = $("#ldsk").val();
    var prin = $("#prin").val();
    var mrkps = $("#mrkps").val();
    var mrkbt = $("#mrkbt").val();
    var perci = $("#perci").val();
    var tog = $("#tog").val();
    var resm = $("#resmes").val();

    if (attd == null || attd == "") {
      $(toastr.error("Mental alertness field is empty"));
    } else {
      if (attd > 5) {
        $(toastr.error("Max Mental alertness score is 5"));
      } else {
        if (punc == null || punc == "") {
          $(toastr.error("Physical development field is empty"));
        } else {
          if (punc > 5) {
            $(toastr.error("Physical development field value is greater 5"));
          } else {
            if (hons == null || hons == "") {
              $(toastr.error("Adjustment in school field is empty"));
            } else {
              if (hons > 5) {
                $(toastr.error("Adjustment in school field value can`t be greater than 5"));
              } else {
                if (neat == null || neat == "") {
                  $(toastr.error("Relationship with teachers field is empty"));
                } else {
                  if (neat > 5) {
                    $(toastr.error("Relationship with teachers field can`t be empty"));
                  } else {
                    if (nonaggr == null || nonaggr == "") {
                      $(toastr.error("Relationship with students field can`t be empty"));
                    } else {
                      if (nonaggr > 5) {
                        $(
                          toastr.error(
                            "Relationship with students field value can`t be greater 5"
                          )
                        );
                      } else {
                        if (ldsk == null || ldsk == "") {
                          $(toastr.error("General attitude and habit field is empty"));
                        } else {
                          if (ldsk > 5) {
                            $(toastr.error("General attitude and habit field value can`t be greater than 5"));
                          } else {
                              $(toastr.error("Loading Please wait..."));

                              $.ajax({
                                type: "post",
                                url: "functions/init.php",
                                data: {
                                  attd: attd,
                                  punc: punc,
                                  hons: hons,
                                  neat: neat,
                                  nonaggr: nonaggr,
                                  ldsk: ldsk,
                                  prin: prin,
                                  classr: classr,
                                  cls: cls,
                                  ncls: ncls,
                                  term: term,
                                  mrkps: mrkps,
                                  mrkbt: mrkbt,
                                  perci: perci,
                                  tog: tog,
                                  ses: ses,
                                  resm: resm,
                                },
                                success: function (data) {
                                  $(
                                    toastr.error(data)
                                  ).html(data);
                                },
                              });
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
          }
        }
  });


  //submit result
  $("#eddsubdone").click(function () {
    var classr = $("#admis").val();
    var cls = $("#cla").val();
    var ncls = $("#cls").val();
    var term = $("#term").val();
    var ses = $("#ses").val();
    var attd = $("#attd").val();
    var punc = $("#punc").val();
    var hons = $("#hons").val();
    var neat = $("#neat").val();
    var nonaggr = $("#nonaggr").val();
    var ldsk = $("#ldsk").val();
    var prin = $("#prin").val();
    var mrkps = $("#mrkps").val();
    var mrkbt = $("#mrkbt").val();
    var perci = $("#perci").val();
    var tog = $("#tog").val();
    var resm = $("#resmes").val();
    var conf = "holla";

    if (attd == null || attd == "") {
      $(toastr.error("Mental alertness field is empty"));
    } else {
      if (attd > 5) {
        $(toastr.error("Max Mental alertness score is 5"));
      } else {
        if (punc == null || punc == "") {
          $(toastr.error("Physical development field is empty"));
        } else {
          if (punc > 5) {
            $(toastr.error("Physical development field value is greater 5"));
          } else {
            if (hons == null || hons == "") {
              $(toastr.error("Adjustment in school field is empty"));
            } else {
              if (hons > 5) {
                $(toastr.error("Adjustment in school field value can`t be greater than 5"));
              } else {
                if (neat == null || neat == "") {
                  $(toastr.error("Relationship with teachers field is empty"));
                } else {
                  if (neat > 5) {
                    $(toastr.error("Relationship with teachers field can`t be empty"));
                  } else {
                    if (nonaggr == null || nonaggr == "") {
                      $(toastr.error("Relationship with students field can`t be empty"));
                    } else {
                      if (nonaggr > 5) {
                        $(
                          toastr.error(
                            "Relationship with students field value can`t be greater 5"
                          )
                        );
                      } else {
                        if (ldsk == null || ldsk == "") {
                          $(toastr.error("General attitude and habit field is empty"));
                        } else {
                          if (ldsk > 5) {
                            $(toastr.error("General attitude and habit field value can`t be greater than 5"));
                          } else {
                              $(toastr.error("Loading Please wait..."));

                              $.ajax({
                                type: "post",
                                url: "functions/init.php",
                                data: {
                                  attd: attd,
                                  punc: punc,
                                  hons: hons,
                                  neat: neat,
                                  nonaggr: nonaggr,
                                  ldsk: ldsk,
                                  prin: prin,
                                  classr: classr,
                                  cls: cls,
                                  ncls, ncls,
                                  term: term,
                                  mrkps: mrkps,
                                  mrkbt: mrkbt,
                                  perci: perci,
                                  tog: tog,
                                  ses: ses,
                                  resm: resm,
                                  conf: conf
                                },
                                success: function (data) {
                                  $(
                                    toastr.error(data)
                                  ).html(data);
                                },
                              });
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
          }
        }
  });

  //preview result
  $("#prev").click(function () {
    var std = $("#std").val();
    var cls = $("#class").val();
    var term = $("#term").val();
    var ses = $("#ses").val();

    $(toastr.error("Loading Please wait..."));
    window.location.href =
      "./moreres?id=" + std + "&cls=" + cls + "&term=" + term + "&ses=" + ses;
  });

  //upload assignment
  $("#uplagn").click(function () {
    var fd = new FormData();
    var file = $("#fileToUpload").prop("files")[0];
    fd.append("assfile", file);

    if (file == null || file == "") {
      $(toastr.error("Assignment file can`t be empty"));
    } else {
      $("#ModalCenter").modal("show");
      $(toastr.error("Loading... Please wait"));

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $(toastr.error(data)).html(data);
        },
      });
    }
  });

  //edit uploaded assignment file
  $("#eduplagn").click(function () {
    var fd = new FormData();
    var files = $("#edfileToUpload").prop("files")[0];
    fd.append("fle", files);

    if (files == null || files == "") {
      $(toastr.error("Assignment file can`t be empty"));
    } else {
      $("#ModalCenter").modal("show");
      $(toastr.error("Loading... Please wait"));
      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $(toastr.error(data)).html(data);
        },
      });
    }
  });


    //-------------reset assignmnets------------------//
    $("#assreseted").click(function () {
      var assclss = $("#clss").text();
  
      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: {assclss:assclss},
        success: function (data) {
          $(toastr.error(data)).html(data);
        },
      });
    });
});
