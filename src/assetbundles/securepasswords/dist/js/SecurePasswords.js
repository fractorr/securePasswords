/**
 * Secure Passwords plugin for Craft CMS
 *
 * Secure Passwords JS
 *
 * @author    Trevor Orr
 * @copyright Copyright (c) 2017 Trevor Orr
 * @link      http://www.fractorr.com
 * @package   SecurePasswords
 * @since     1.0.0
 */
$("#settings-passwordRules-field .heading .instructions table tr td:last-child").on("click", function(evt) {
	$(".btn.add.icon").click();

	var fromTable = $(this).parent().parent().parent();
	var fromRow = $(this).parent().index()+1;
	var toRow = $("table#settings-passwordRules tbody tr:last-child").data("id");
	
	var cName = fromTable.find("tr:nth(" + fromRow  + ")").find("td:nth(0)").text();
	var cMessage = fromTable.find("tr:nth(" + fromRow  + ")").find("td:nth(1)").text();
	var cExpression = fromTable.find("tr:nth(" + fromRow  + ")").find("td:nth(2)").text();
	var cMatch = fromTable.find("tr:nth(" + fromRow  + ")").find("td:nth(3)").text().toLowerCase().replace(/ /g, "_");
	
    $("table#settings-passwordRules tbody tr:last-child td [name='settings[passwordRules][" + toRow + "][0]']").val(cName);
    $("table#settings-passwordRules tbody tr:last-child td [name='settings[passwordRules][" + toRow + "][1]']").val(cMessage);
    $("table#settings-passwordRules tbody tr:last-child td [name='settings[passwordRules][" + toRow + "][2]']").val(cExpression);
    $("table#settings-passwordRules tbody tr:last-child td [name='settings[passwordRules][" + toRow + "][3]']").val(cMatch);
});

