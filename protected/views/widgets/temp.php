var html = '<style type="text/css">'+
'import url(http://fonts.googleapis.com/css?family=Open+Sans);'+
'.brdr{'+
'border: 1px solid;'+
'}'+
'.wrap-widget-badge{'+
'width: 250px;font-family:sans-serif;overflow-y: auto;padding: 15px;max-height: 255px;height: 255px;-moz-box-sizing: border-box;box-sizing: border-box;border: 1px solid #ddd;border-radius: 3px;}'+
'a {color: #428BCA;text-decoration: none;}'+
'a:hover,a:focus{'+
'color: #2a6496;'+
'text-decoration: underline;'+
'}'+
'.text-center{'+
'text-align: center;'+
'}'+
'.btn {'+
'display: inline-block;'+
'padding: 6px 12px;'+
'margin-bottom: 0;'+
'font-size: 14px;'+
'font-weight: normal;'+
'line-height: 1.42857143;'+
'text-align: center;'+
'white-space: nowrap;'+
'vertical-align: middle;'+
'cursor: pointer;'+
'-webkit-user-select: none;'+
'-moz-user-select: none;'+
'-ms-user-select: none;'+
' user-select: none;'+
'background-image: none;'+
' border: 1px solid transparent;'+
' border-radius: 4px;'+
'}'+
'.btn:focus,'+
'.btn:active:focus,'+
'.btn.active:focus {'+
'  outline: thin dotted;'+
'  outline: 5px auto -webkit-focus-ring-color;'+
'  outline-offset: -2px;'+
'	}'+
'.btn:hover,'+
'	.btn:focus {'+
' color: #333;'+
'text-decoration: none;'+
'}'+
'.btn-danger '+
' color: #fff;'+
'  background-color: #d9534f;'+
'  border-color: #d43f3a;'+
'	}'+
'.btn-danger:hover,'+
'	.btn-danger:focus'+
'.btn-danger:active,'+
'	.btn-danger.active,'+
'	.open .dropdown-toggle.btn-danger {'+
'	  color: #fff;'+
'	  background-color: #d2322d;'+
'	  border-color: #ac2925;'+
'	}'+
'	.form-control {'+
'	  display: block;'+
'	  width: 100%;'+
'	  height: 20px;'+
'	  padding: 6px 12px;'+
'	  font-size: 14px;'+
'	  line-height: 1.42857143;'+
'	  color: #555;'+
'	  background-color: #fff;'+
'	  background-image: none;'+
'	  border: 1px solid #ccc;'+
'	  border-radius: 4px;'+
'	  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);'+
'	          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);'+
'	  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;'+
'	          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;'+
'	}'+
'	.form-control:focus {'+
'	  border-color: #66afe9;'+
'	  outline: 0;'+
'	  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);'+
'	          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);'+
'	}'+
'	.form-control::-moz-placeholder {'+
'	  color: #999;'+
'	  opacity: 1;'+
'	}'+
'	.form-control:-ms-input-placeholder {'+
'	  color: #999;'+
'	}'+
'	.form-control::-webkit-input-placeholder {'+
'	  color: #999;'+
'	}'+
'	.input-group-addon,'+
'	.input-group-btn {'+
'	  width: 1%;'+
'	  white-space: nowrap;'+
'	  vertical-align: middle;'+
'	}'+
'	.input-group-btn {'+
'	  position: relative;'+
'	  font-size: 0;'+
'	  white-space: nowrap;'+
'	}'+
'	.input-group .form-control {'+
'	  position: relative;'+
'	  z-index: 2;'+
'		  float: left;'+
'		  width: 85%;'+
'		  margin-bottom: 0;'+
'		}'+
'		.input-group-addon,'+
'		.input-group-btn,'+
'		.input-group .form-control {'+
'		  display: table-cell;'+
'		}'+
'		.input-group .form-control:first-child,'+
'		.input-group-addon:first-child,'+
'		.input-group-btn:first-child > .btn,'+
'		.input-group-btn:first-child > .btn-group > .btn,'+
'		.input-group-btn:first-child > .dropdown-toggle,'+
'		.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),'+
'		.input-group-btn:last-child > .btn-group:not(:last-child) > .btn {'+
'		border-top-right-radius: 0;'+
'		  border-bottom-right-radius: 0;
'}'+
'		.input-group {'+
'		  position: relative;'+
'		  display: table;'+
'		  border-collapse: separate;'+
'		}'+
'		input{'+
'			color: inherit;'+
'		    font: inherit;'+
'		    margin: 0'+
'		    line-height: normal;'+
'		}'+
'		.input-group .form-control:first-child,'+
'		.input-group-addon:first-child,'+
'		.input-group-btn:first-child > .btn,'+
'		.input-group-btn:first-child > .btn-group > .btn,'+
'		.input-group-btn:first-child > .dropdown-toggle,'+
'		.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),'+
'		.input-group-btn:last-child > .btn-group:not(:last-child) > .btn {'+
'		  border-top-right-radius: 0;'+
'		  border-bottom-right-radius: 0;'+
'		}'+
'		.input-group-addon:first-child {'+
'		  border-right: 0;'+
'		}'+
'		.input-group .form-control:last-child,'+
'		.input-group-addon:last-child,'+
'		.input-group-btn:last-child > .btn,'+
'		.input-group-btn:last-child > .btn-group > .btn,'+
'		.input-group-btn:last-child > .dropdown-toggle,'+
'		.input-group-btn:first-child > .btn:not(:first-child),'+
'		.input-group-btn:first-child > .btn-group:not(:first-child) > .btn {'+
'		  border-top-left-radius: 0;'+
'		  border-bottom-left-radius: 0;'+
'		}'+
'		.input-group-addon:last-child {'+
'		  border-left: 0;'+
'		}'+
'		.input-group-btn {'+
'		  position: relative;'+
'		  font-size: 0;'+
'		  white-space: nowrap;'+
'		}'+
'		.input-group-btn > .btn {'+
'		  position: relative;'+
'		}'+
'		.input-group-btn > .btn + .btn {'+
'		  margin-left: -1px;'+
'		}'+
'		.input-group-btn > .btn:hover,'+
'		.input-group-btn > .btn:focus,'+
'		.input-group-btn > .btn:active {'+
'		  z-index: 2;'+
'		}'+
'		.input-group-btn:first-child > .btn,'+
'		.input-group-btn:first-child > .btn-group {'+
'		  margin-right: -1px;'+
'		}'+
'		.input-group-btn:last-child > .btn,'+
'		.input-group-btn:last-child > .btn-group {'+
'		  margin-left: -1px;'+
'		}'+
'	</style>'+
'	<div class="wrap-widget-badge text-center">'+
'		<img src="http://d2qcctj8epnr7y.cloudfront.net/images/jayson/badge-handyman-1.png">'+
'		<div class="input-group">'+
'            <input type="text" name="searchkey" class="form-control">'+
'            <span class="input-group-btn">'+
'            <a class="btn btn-danger" href="javascript:;">Go</a>'+
'            </span>'+
'        </div>'+
'	</div>';
document.write(html);

/*
html += '.input-group .form-control:first-child,';
html += '		.input-group-addon:first-child,';
html += '		.input-group-btn:first-child > .btn,';
html += '		.input-group-btn:first-child > .btn-group > .btn,';
html += '		.input-group-btn:first-child > .dropdown-toggle,';
html += '		.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),';
html += '		.input-group-btn:last-child > .btn-group:not(:last-child) > .btn {';
html += '		  border-top-right-radius: 0;';
html += '		  border-bottom-right-radius: 0;';
html += '		}';
html += '		.input-group-addon:first-child {';
html += '		  border-right: 0;';
html += '		}';
html += '		.input-group .form-control:last-child,';
html += '		.input-group-addon:last-child,';
html += '		.input-group-btn:last-child > .btn,';
html += '		.input-group-btn:last-child > .btn-group > .btn,';
html += '		.input-group-btn:last-child > .dropdown-toggle,';
html += '		.input-group-btn:first-child > .btn:not(:first-child),';
html += '		.input-group-btn:first-child > .btn-group:not(:first-child) > .btn {';
html += '		  border-top-left-radius: 0;';
html += '		  border-bottom-left-radius: 0;';
html += '		}';
html += '		.input-group-addon:last-child {';
html += '		  border-left: 0;';
html += '		}';
html += '		.input-group-btn {';
html += '		  position: relative;';
html += '		  font-size: 0;';
html += '		  white-space: nowrap;';
html += '	}';
html += '		.input-group-btn > .btn {';
html += '		  position: relative;';
html += '		}';
html += '		.input-group-btn > .btn + .btn {';
html += '		  margin-left: -1px;';
html += '		}';
html += '		.input-group-btn > .btn:hover,';
html += '		.input-group-btn > .btn:focus,';
html += '		.input-group-btn > .btn:active {';
html += '		  z-index: 2;';
html += '		}';
html += '		.input-group-btn:first-child > .btn,';
html += '		.input-group-btn:first-child > .btn-group {';
html += '		  margin-right: -1px;';
html += '		}';
html += '		.input-group-btn:last-child > .btn,';
html += '		.input-group-btn:last-child > .btn-group {';
html += '		  margin-left: -1px;';
html += '		}';
*/