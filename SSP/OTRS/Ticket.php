<?php
#namespace SSP\OTRS;
class Ticket
{
	private $id = 0;
	private $otrs = null;
	private $detais = array();
	private $changes = array();
	private $create = false;
	public function __construct($ticketID, $otrs)
	{
		$this->id = $ticketID;
		$this->otrs = $otrs;
		if($ticketID!=0)
		{
			$ticketDetais = $this->getTicketDetais($ticketID);
			$this->detais = get_object_vars($ticketDetais);
		}
		else
		{
			$this->createTicket();
		}
	}
	private function getTicketDetais($id)
	{
		$param = array(new SoapParam($id, "TicketID"));
		$res = $this->otrs->callSoap("TicketGet", $param);
		return $res;
	}
	private function createTicket()
	{
		$this->create=true;
	}
	public function getAge()
	{
		return $this->detais["Age"];
	}
	public function getArchiveFlag()
	{
		return $this->detais["ArchiveFlag"];
	}
	public function getChangeBy()
	{
		return $this->detais["ChangeBy"];
	}
	public function getCreateBy()
	{
		return $this->detais["CreateBy"];
	}
	public function getCreateTimeUnix()
	{
		return $this->detais["CreateTimeUnix"];
	}
	public function getCreated()
	{
		return $this->detais["Created"];
	}
	public function getCustomerID()
	{
		return $this->detais["CustomerID"];
	}
	public function getCustomerUserID()
	{
		return $this->detais["CustomerUserID"];
	}
	public function getEscalationResponseTime()
	{
		return $this->detais["EscalationResponseTime"];
	}
	public function getEscalationSolutionTime()
	{
		return $this->detais["EscalationSolutionTime"];
	}
	public function getEscalationTime()
	{
		return $this->detais["EscalationTime"];
	}
	public function getEscalationUpdateTime()
	{
		return $this->detais["EscalationUpdateTime"];
	}
	public function getGroupID()
	{
		return $this->detais["GroupID"];
	}
	public function getLock()
	{
		return $this->detais["Lock"];
	}
	public function getLockID()
	{
		return $this->detais["LockID"];
	}
	public function getOwner()
	{
		return $this->detais["Owner"];
	}
	public function getOwnerID()
	{
		return $this->detais["OwnerID"];
	}
	public function getPriority()
	{
		return $this->detais["Priority"];
	}
	public function getPriorityID()
	{
		return $this->detais["PriorityID"];
	}
	public function getQueue()
	{
		return $this->detais["Queue"];
	}
	public function getQueueID()
	{
		return $this->detais["QueueID"];
	}
	public function getRealTillTimeNotUsed()
	{
		return $this->detais["RealTillTimeNotUsed"];
	}
	public function getResponsible()
	{
		return $this->detais["Responsible"];
	}
	public function getResponsibleID()
	{
		return $this->detais["ResponsibleID"];
	}
	public function getSLAID()
	{
		return $this->detais["SLAID"];
	}
	public function getServiceID()
	{
		return $this->detais["ServiceID"];
	}
	public function getState()
	{
		return $this->detais["State"];
	}
	public function getTicketID()
	{
		return $this->detais["TicketID"];
	}
	public function getTicketNumber()
	{
		return $this->detais["TicketNumber"];
	}
	public function getTitle()
	{
		return $this->detais["Title"];
	}
	public function getType()
	{
		return $this->detais["Type"];
	}
	public function getTypeID()
	{
		return $this->detais["TypeID"];
	}
	public function getUnlockTimeout()
	{
		return $this->detais["UnlockTimeout"];
	}
	public function getUntilTime()
	{
		return $this->detais["UntilTime"];
	}
	public function setTitle($title)
	{
		$this->changes[]="Title";
		$this->detais["Title"]=$title;
	}
	public function setQueueID($QueueID)
	{
		$this->changes[]="QueueID";
		$this->detais["QueueID"]=$QueueID;
	}
	public function setQueue($Queue)
	{
		$this->changes[]="Queue";
		$this->detais["Queue"]=$Queue;
	}
	public function setTypeID($TypeID)
	{
		$this->changes[]="TypeID";
		$this->detais["TypeID"]=$TypeID;
	}
	public function setType($Type)
	{
		$this->changes[]="Type";
		$this->detais["Type"]=$Type;
	}
	public function setServiceID($ServiceID)
	{
		$this->changes[]="ServiceID";
		$this->detais["ServiceID"]=$ServiceID;
	}
	public function setService($Service)
	{
		$this->changes[]="Service";
		$this->detais["Service"]=$Service;
	}
	public function setSLAID($SLAID)
	{
		$this->changes[]="SLAID";
		$this->detais["SLAID"]=$SLAID;
	}
	public function setSLA($SLA)
	{
		$this->changes[]="SLA";
		$this->detais["SLA"]=$SLA;
	}
	public function setStateID($StateID)
	{
		$this->changes[]="StateID";
		$this->detais["StateID"]=$StateID;
	}
	public function setState($State)
	{
		$this->changes[]="State";
		$this->detais["State"]=$State;
	}
	public function setPriorityID($PriorityID)
	{
		$this->changes[]="PriorityID";
		$this->detais["PriorityID"]=$PriorityID;
	}
	public function setPriority($Priority)
	{
		$this->changes[]="Priority";
		$this->detais["Priority"]=$Priority;
	}
	public function setOwnerID($OwnerID)
	{
		$this->changes[]="OwnerID";
		$this->detais["OwnerID"]=$OwnerID;
	}
	public function setOwner($Owner)
	{
		$this->changes[]="Owner";
		$this->detais["Owner"]=$Owner;
	}
	public function setResponsibleID($ResponsibleID)
	{
		$this->changes[]="ResponsibleID";
		$this->detais["ResponsibleID"]=$ResponsibleID;
	}
	public function setResponsible($Responsible)
	{
		$this->changes[]="Responsible";
		$this->detais["Responsible"]=$Responsible;
	}
	public function setCustomerUser($CustomerUser)
	{
		$this->changes[]="CustomerUser";
		$this->detais["CustomerUser"]=$CustomerUser;
	}
	public function save()
	{
		$params = array();
		foreach($this->changes as $c)
		{
			$params[$c]=$this->detais[$c];
		}
		$param = array(new SoapParam($this->id, "TicketID"), new SoapParam($params, "Ticket"));
		if($this->create)
		{
			$res = $this->otrs->callSoap("TicketCreate", $param);
		}
		else
		{
			$res = $this->otrs->callSoap("TicketUpdate", $param);
		}
		if($res["TicketID"]==$this->id)
		{
			return true;
		}
		return false;
		#var_dump($res);
	}

}