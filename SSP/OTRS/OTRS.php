<?php
#namespace SSP\OTRS;
class OTRS extends SoapOTRS
{
	public function getTicket($ticketID)
	{
		$t = new Ticket($ticketID, $this);
		return $t;
	}
	public function newTicket()
	{
		$t = new Ticket(0, $this);
		return $t;
	}
}
?>